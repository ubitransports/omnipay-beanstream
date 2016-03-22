<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Tests\TestCase;

class CreateProfileRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new CreateProfileRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize();
    }

    public function testEndpoint()
    {
        $this->assertSame('https://www.beanstream.com/api/v1/profiles', $this->request->getEndpoint());
    }

    public function testLanguage()
    {
        $this->assertSame($this->request, $this->request->setLanguage('123'));
        $this->assertSame('123', $this->request->getLanguage());
    }

    public function testComment()
    {
        $this->assertSame($this->request, $this->request->setComment('test'));
        $this->assertSame('test', $this->request->getComment());
    }

    public function testBilling()
    {
        $billing = array(
            'name' => 'test mann',
            'email_address' => 'testmann@email.com',
            'address_line1' => '123 Test St',
            'address_line2' => '',
            'city' => 'vancouver',
            'province' => 'bc',
            'postal_code' => 'H0H0H0',
            'phone_number' => '1 (555) 555-5555'
        );

        $this->assertSame($this->request, $this->request->setBilling($billing));
        $this->assertSame($billing, $this->request->getBilling());
    }

    public function testBillingAndToken()
    {
        $billing = array(
            'name' => 'test mann',
            'email_address' => 'testmann@email.com',
            'address_line1' => '123 Test St',
            'address_line2' => '',
            'city' => 'vancouver',
            'province' => 'bc',
            'postal_code' => 'H0H0H0',
            'phone_number' => '1 (555) 555-5555'
        );

        $token = array(
            'name' => 'token-test-name',
            'code' => 'token-test-code'
        );

        $this->assertSame($this->request, $this->request->setBilling($billing));
        $this->assertSame($this->request, $this->request->setToken($token));
        $this->assertSame($billing, $this->request->getBilling());
        $this->assertSame($token, $this->request->getToken());
    }

    public function testCard()
    {
        $billing = array(
            'name' => 'Example User',
            'address_line1' => '123 Billing St',
            'address_line2' => 'Billsville',
            'city' => 'Billstown',
            'province' => 'CA',
            'country' => 'US',
            'postal_code' => '12345',
            'phone_number' => '(555) 123-4567',
            'email_address' => null
        );

        $card = $this->getValidCard();
        $this->assertSame($this->request, $this->request->setCard($card));
        $this->request->setCard($card);
        $data = $this->request->getData();
        $this->assertSame($billing, $data['billing']);
    }

    public function testHttpMethod()
    {
        $this->assertSame('POST', $this->request->getHttpMethod());
    }
}
