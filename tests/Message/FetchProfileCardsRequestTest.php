<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Tests\TestCase;

class FetchProfileCardsRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new FetchProfileCardsRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize();
    }

    public function testEndpoint()
    {
        $this->assertSame($this->request, $this->request->setProfileId('1'));
        $this->assertSame('1', $this->request->getProfileId());
        $this->assertSame('https://www.beanstream.com/api/v1/profiles/' . $this->request->getProfileId() . '/cards', $this->request->getEndpoint());
    }

    public function testHttpMethod()
    {
        $this->assertSame('GET', $this->request->getHttpMethod());
    }
}
