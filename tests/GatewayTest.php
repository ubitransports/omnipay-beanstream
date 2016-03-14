<?php namespace Omnipay\Beanstream;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->options = array(
            'amount'    => '10.00',
            'card'      => $this->getValidCard(),
        );
    }

    public function testAuthorize()
    {
        $request = $this->gateway->authorize($this->options);
        $this->assertInstanceOf('Omnipay\Beanstream\Message\AuthorizeRequest', $request);
    }

    public function testPurchase()
    {
        $request = $this->gateway->authorize($this->options);
        $this->assertInstanceOf('Omnipay\Beanstream\Message\PurchaseRequest', $request);
    }
}
