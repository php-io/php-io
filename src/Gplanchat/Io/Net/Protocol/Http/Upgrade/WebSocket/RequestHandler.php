<?php

namespace Gplanchat\Io\Net\Protocol\Http\Upgrade\WebSocket;

use Gplanchat\EventManager\CallbackHandler;
use Gplanchat\EventManager\EventEmitterTrait;
use Gplanchat\Io\Net\Tcp\ClientInterface;
use Gplanchat\Io\Net\Protocol\Http\Exception;
use Gplanchat\Io\Net\Protocol\Http;
use Gplanchat\Io\Net\Protocol\Http\Upgrade\ProtocolUpgradeAwareInterface;
use Gplanchat\Io\Net\Protocol\RequestHandlerInterface;
use Gplanchat\EventManager\Event;
use Gplanchat\Log\LoggerAwareInterface;
use Gplanchat\Log\LoggerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerAwareInterface;
use Gplanchat\ServiceManager\ServiceManagerAwareTrait;
use Gplanchat\ServiceManager\ServiceManagerInterface;
use RuntimeException;

class RequestHandler
    implements RequestHandlerInterface, ProtocolUpgradeAwareInterface, ServiceManagerAwareInterface, LoggerAwareInterface
{
    use ServiceManagerAwareTrait;
    use EventEmitterTrait;
    use LoggerAwareTrait;

    const SECURITY_GUID = '258EAFA5-E914-47DA-95CA-C5AB0DC85B11';

    private static $supportedVersions = [6, 8, 13];

    /**
     * @var CallbackHandler
     */
    private $callbackHandler = null;

    private $buffer = '';

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->setServiceManager($serviceManager);

//        $this->setLogger($this->getServiceManager()->get('Logger'));
    }

    /**
     * @param ClientInterface $client
     * @param string $input
     * @param int $length
     * @param bool $isError
     * @throws RuntimeException
     * @return RequestHandlerInterface
     */
    public function __invoke(Event $event, ClientInterface $client, $input, $length, $isError)
    {
        $this->buffer .= $input;

        $request = $this->getServiceManager()->get('Request');
        $response = $this->getServiceManager()->get('Response');

        $response->on(['ready'], function(Event $event) use($client, $request) {
            /** @var Response $response */
            $response = $event->getData('eventEmitter');

            $response->send($client);
        });

        while (strlen($this->buffer) > 2) {
            $offset = 0;
            $tmp = ord(substr($this->buffer, $offset++, 1));
//            $fin = (bool) (($tmp & 0x80) >> 7);
//            $rsv = (($tmp & 0x70) >> 4);
//            $opcode = ($tmp & 0x0F);

//            if ($rsv !== 0) {
//                throw new Exception\BadRequestException('RSV bits defined while unsupported by any extension');
//            }

            /*
             * TODO: $opcode possible values:
             *
             * %x0 denotes a continuation frame
             * %x1 denotes a text frame
             * %x2 denotes a binary frame
             * %x3-7 are reserved for further non-control frames
             * %x8 denotes a connection close
             * %x9 denotes a ping
             * %xA denotes a pong
             * %xB-F are reserved for further control frames
             */

            $tmp = ord(substr($this->buffer, $offset++, 1));
            $maskBit = (bool) ($tmp & 0x80);
            $lengthMarker = $tmp & 0x7F;
            if ($lengthMarker == 126) {
                $length = $this->_parseInt($offset, 2);
                $offset += 2;

                if ($length <= 126) {
                    throw new Exception\BadRequestException('Wrong message length.');
                }
            } else if ($lengthMarker == 127) {
                $length = $this->_parseInt($offset, 8);
                $offset += 8;

                if ($length <= 127) {
                    throw new Exception\BadRequestException('Wrong message length.');
                }
            } else {
                $length = $lengthMarker;
            }

            if ($maskBit) {
                $mask = array(
                    (ord(substr($this->buffer, $offset++, 1)) & 0xFF),
                    (ord(substr($this->buffer, $offset++, 1)) & 0xFF),
                    (ord(substr($this->buffer, $offset++, 1)) & 0xFF),
                    (ord(substr($this->buffer, $offset++, 1)) & 0xFF)
                );

//                $this->getLogger()->warning('Client data should be masked.');
            }

            if (strlen($this->buffer) < $offset + $length) {
                break;
            }

            $rawPayload = substr($this->buffer, $offset, $length);
            $this->buffer = substr($this->buffer, $offset + $length);

            if ($maskBit) {
                $payload = '';
                for ($i = 0; $i < $length; $i++) {
                    $payload .= chr(ord($rawPayload[$i]) ^ $mask[$i % 4]);
                }
            } else {
                $payload = $rawPayload;
            }
            $request->enqueue($payload);
        }

        $this->emit(new Event('data'), [$client, $request, $response]);

        return $this;
    }

    public function setCallbackHandler(CallbackHandler $callbackHandler)
    {
        $this->callbackHandler = $callbackHandler;

        return $this;
    }

    public function getCallbackHandler()
    {
        return $this->callbackHandler;
    }

    /**
     * Process WebSocket handshake
     *
     * @param ClientInterface $client
     * @param Http\Request $request
     * @param Http\Response $response
     * @return ProtocolUpgradeAwareInterface
     * @throws \Gplanchat\Io\Net\Protocol\Http\Exception\BadRequestException
     */
    public function upgrade(ClientInterface $client, Http\Request $request, Http\Response $response)
    {
        if (($connectionHeader = $request->getHeader('CONNECTION')) === null) {
            throw new Exception\BadRequestException('Header Connection required.');
        }

        $connectionParams = preg_split('#\s*,\s*#', strtolower($request->getHeader('CONNECTION')), PREG_SPLIT_NO_EMPTY);
        foreach ($connectionParams as &$param) {
            $param = strtolower($param);
        }
        unset($param);

        if (!in_array('upgrade', $connectionParams)) {
            throw new Exception\BadRequestException('Header Connection required or invalid value provided.');
        }

        if (($securityKey = $request->getHeader('SEC_WEBSOCKET_KEY')) === null || !preg_match('#[A-Za-z0-9+/]{22}==#', $securityKey, $m)) {
            throw new Exception\BadRequestException('Header Sec-WebSocket-Key required or invalid value provided.');
        }
//        $client->getDataStore('WebSocket')->set('securityKey', $securityKey);

        if (($protocolVersion = $request->getHeader('SEC_WEBSOCKET_VERSION')) === null || !in_array($protocolVersion, static::$supportedVersions)) {
            $response
                ->setReturnCode(426, 'Upgrade Required')
                ->setBody('Upgrade Required')
                ->setHeader('Connection', 'close')
                ->setHeader('Sec-WebSocket-Version', implode(', ', static::$supportedVersions))
                ->send($client)
            ;
            return $this;
        }
//        $client->getDataStore('WebSocket')->set('protocolVersion', $protocolVersion);

        if (($protocol = $request->getHeader('SEC_WEBSOCKET_PROTOCOL')) !== null) {
            $protocolList = preg_split('#\s*,\s*#', strtolower($protocol), PREG_SPLIT_NO_EMPTY);

//            $client->getDataStore('WebSocket')->set('protocols', $protocolList);

            $this->emit(new Event('registerProtocols'), [$protocolList]);
        }

        if (($extension = $request->getHeader('SEC_WEBSOCKET_EXTENSIONS')) !== null) {
            $extensionList = preg_split('#\s*,\s*#', strtolower($extension), PREG_SPLIT_NO_EMPTY);

//            $client->getDataStore('WebSocket')->set('extensions', $extensionList);

            $this->emit(new Event('registerExtensions'), [$extensionList]);
        }

        $hashHandler = hash_init('sha1');
        hash_update($hashHandler, $securityKey);
        hash_update($hashHandler, static::SECURITY_GUID);
        $hash = base64_encode(hash_final($hashHandler, true));

//        $this->getLogger()->info('Switching to WebSocket');

        $response
            ->setReturnCode(101, 'Switching Protocols')
            ->setHeader('Upgrade', 'websocket')
            ->setHeader('Connection', 'Upgrade')
            ->setHeader('Sec-WebSocket-Accept', $hash)
            ->send($client)
        ;

        return $this;
    }

    protected function _parseInt($offset, $length)
    {
        $int = 0;

        for ($i = $length; $i >= 0; $i--) {
            $int += (ord(substr($this->buffer, $offset++, 1)) & 0xFF) << (8 * $i);
        }

        return $int;
    }
}
