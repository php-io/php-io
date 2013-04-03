<?php


namespace GplanchatTest\Io\Net\Protocol\Http;

use Gplanchat\Io\Net\Protocol\Http\Request;

class RequestTest
    extends \PHPUnit_Framework_TestCase
{
    public function testGetMethod()
    {
        $request = new Request('get', '/');

        $this->assertEquals('GET', $request->getMethod());

        $request = new Request('GET', '/');

        $this->assertEquals('GET', $request->getMethod());

        $request = new Request('GeT', '/');

        $this->assertEquals('GET', $request->getMethod());
    }

    public function testGetPath()
    {
        $request = new Request('GET', '/');

        $this->assertEquals('/', $request->getPath());

        $request = new Request('GET', '/test.php');

        $this->assertEquals('/test.php', $request->getPath());

        $request = new Request('GET', '/?test=1&foo=3');

        $this->assertEquals('/', $request->getPath());

        return $request;
    }

    public function testGetUri()
    {
        $request = new Request('GET', '/');

        $this->assertEquals('/', $request->getUri());

        $request = new Request('GET', '/test.php');

        $this->assertEquals('/test.php', $request->getUri());

        $request = new Request('GET', '/?test=1&foo=3');

        $this->assertEquals('/?test=1&foo=3', $request->getUri());

        return $request;
    }

    public function testGetPathFailsWithEmptyPath()
    {
        $this->setExpectedException('Gplanchat\\Io\\Net\\Protocol\\Http\\Exception\\BadRequestException');
        new Request('GET', '');
    }

    public function testGetQueryParamsPassedToConstructor()
    {
        $request = new Request('GET', '/');

        $this->assertCount(0, $request->getQueryParams());

        $request = new Request('GET', '/test.php');

        $this->assertCount(0, $request->getQueryParams());

        $request = new Request('GET', '/?test=1&foo=3');

        $this->assertInstanceOf('ArrayObject', $request->getQueryParams());
        $this->assertCount(2, $request->getQueryParams());

        return $request;
    }

    /**
     * @depends testGetQueryParamsPassedToConstructor
     */
    public function testGetQueryParamPassedToConstructor(Request $request)
    {
        $this->assertEquals(3, $request->getQuery('foo'));

        return $request;
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testSetQueryParam(Request $request)
    {
        $request->setQuery('foo', 8);
        $this->assertEquals(8, $request->getQuery('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentQueryParamWithoutDefault(Request $request)
    {
        $this->assertNull($request->getQuery('bar'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentQueryParamWithDefault(Request $request)
    {
        $this->assertEquals(74, $request->getQuery('bar', 74));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testSetQueryParamByDereference(Request $request)
    {
        $request->getQueryParams()['foo'] = 8;
        $this->assertEquals(8, $request->getQuery('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testSetPostParams(Request $request)
    {
        $request->setPostParams(new \ArrayObject(['foo' => 1, 'bar' => 45]));

        $this->assertInstanceOf('ArrayObject', $request->getPostParams());
        $this->assertCount(2, $request->getPostParams());

        return $request;
    }

    /**
     * @depends testSetPostParams
     */
    public function testSetPostParam(Request $request)
    {
        $request->setPost('foo', 8);
        $this->assertEquals(8, $request->getPost('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentPostParamWithoutDefault(Request $request)
    {
        $this->assertNull($request->getPost('baz'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentPostParamWithDefault(Request $request)
    {
        $this->assertEquals(85, $request->getPost('baz', 85));
    }

    /**
     * @depends testSetPostParams
     */
    public function testSetPostParamByDereference(Request $request)
    {
        $request->getPostParams()['foo'] = 8;
        $this->assertEquals(8, $request->getPost('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testSetCookieParams(Request $request)
    {
        $request->setCookieParams(new \ArrayObject(['foo' => 39, 'bar' => 45]));

        $this->assertInstanceOf('ArrayObject', $request->getCookieParams());
        $this->assertCount(2, $request->getCookieParams());

        return $request;
    }

    /**
     * @depends testSetCookieParams
     */
    public function testSetCookieParam(Request $request)
    {
        $request->setCookie('foo', 4);
        $this->assertEquals(4, $request->getCookie('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentCookieParamWithoutDefault(Request $request)
    {
        $this->assertNull($request->getCookie('baz'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentCookieParamWithDefault(Request $request)
    {
        $this->assertEquals(85, $request->getCookie('baz', 85));
    }

    /**
     * @depends testSetCookieParams
     */
    public function testSetCookieParamByDereference(Request $request)
    {
        $request->getCookieParams()['foo'] = 8;
        $this->assertEquals(8, $request->getCookie('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testSetServerParams(Request $request)
    {
        $request->setServerParams(new \ArrayObject(['foo' => 41, 'bar' => 45]));

        $this->assertInstanceOf('ArrayObject', $request->getServerParams());
        $this->assertCount(2, $request->getServerParams());

        return $request;
    }

    /**
     * @depends testSetServerParams
     */
    public function testSetServerParam(Request $request)
    {
        $request->setServer('foo', 4);
        $this->assertEquals(4, $request->getServer('foo'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentServerParamWithoutDefault(Request $request)
    {
        $this->assertNull($request->getServer('baz'));
    }

    /**
     * @depends testGetQueryParamPassedToConstructor
     */
    public function testGetInexistentServerParamWithDefault(Request $request)
    {
        $this->assertEquals(85, $request->getServer('baz', 85));
    }

    /**
     * @depends testSetServerParams
     */
    public function testSetServerParamByDereference(Request $request)
    {
        $request->getServerParams()['foo'] = 8;
        $this->assertEquals(8, $request->getServer('foo'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetParamsFromQuery(Request $request)
    {
        $this->assertEquals(3, $request->getParam('foo'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetParamsFromPost(Request $request)
    {
        $request->setPostParams(new \ArrayObject(['baz' => 52]));
        $this->assertEquals(52, $request->getParam('baz'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetParamsFromCookie(Request $request)
    {
        $request->setCookieParams(new \ArrayObject(['bay' => 65]));
        $this->assertEquals(65, $request->getParam('bay'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetParamsFromServer(Request $request)
    {
        $request->setServerParams(new \ArrayObject(['bax' => 14]));
        $this->assertEquals(14, $request->getParam('bax'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetInexistentParamWithoutDefault(Request $request)
    {
        $this->assertNull($request->getParam('baw'));
    }

    /**
     * @depends testGetPath
     */
    public function testGetInexistentParamWithDefault(Request $request)
    {
        $this->assertEquals(52, $request->getParam('bav', 52));
    }

    /**
     * @depends testGetPath
     */
    public function testGetParam(Request $request)
    {
        $request->setParam('foo', 45);
        $request->setPost('foo', 74);
        $request->setQuery('foo', 47);
        $request->setCookie('foo', 35);
        $request->setServer('foo', 41);
        $this->assertEquals(45, $request->getParam('foo'));
    }
}
