<?php

namespace Omnipay\Beanstream\Message;

use Omnipay\Tests\TestCase;

class AuthorizeRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new AuthorizeRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize();
    }

    public function testEndpoint()
    {
        $this->assertSame('https://www.beanstream.com/api/v1/payments', $this->request->getEndpoint());
    }

    public function testMerchantId()
    {
        $this->assertSame($this->request, $this->request->setMerchantId('123'));
        $this->assertSame('123', $this->request->getMerchantId());
    }

    public function testApiPasscode()
    {
        $this->assertSame($this->request, $this->request->setApiPasscode('123'));
        $this->assertSame('123', $this->request->getApiPasscode());
    }

    public function testOrderNumber()
    {
        $this->assertSame($this->request, $this->request->setOrderNumber('123'));
        $this->assertSame('123', $this->request->getOrderNumber());
    }

    public function testLanguage()
    {
        $this->assertSame($this->request, $this->request->setLanguage('123'));
        $this->assertSame('123', $this->request->getLanguage());
    }

    public function testUsername()
    {
        $this->assertSame($this->request, $this->request->setUsername('123'));
        $this->assertSame('123', $this->request->getUsername());
    }

    public function testPassword()
    {
        $this->assertSame($this->request, $this->request->setPassword('123'));
        $this->assertSame('123', $this->request->getPassword());
    }

    public function testComments()
    {
        $this->assertSame($this->request, $this->request->setComments('test'));
        $this->assertSame('test', $this->request->getComments());
    }

    public function testTermUrl()
    {
        $this->assertSame($this->request, $this->request->setTermUrl('test.com'));
        $this->assertSame('test.com', $this->request->getTermUrl());
    }

    public function testToken()
    {
        $this->request->setAmount('10.00');

        $token = array(
            'name' => 'token-test-name',
            'code' => 'token-test-code'
        );

        $this->assertSame($this->request, $this->request->setToken($token));
        $this->assertSame($token, $this->request->getToken());
        $data = $this->request->getData();
        $this->assertSame(false, $data['token']['complete']);
        $this->assertSame('10.00', $this->request->getAmount());
    }

    public function testPaymentProfile()
    {
        $this->request->setAmount('10.00');

        $paymentProfile = array(
            'customer_code' => 'test-customer',
            'card_id' => '1'
        );

        $this->assertSame($this->request, $this->request->setPaymentProfile($paymentProfile));
        $this->assertSame($paymentProfile, $this->request->getPaymentProfile());
        $data = $this->request->getData();
        $this->assertSame(false, $data['payment_profile']['complete']);
        $this->assertSame('10.00', $this->request->getAmount());
    }

    public function testPaymentMethod()
    {
        $this->assertSame($this->request, $this->request->setPaymentMethod('card'));
        $this->assertSame('card', $this->request->getPaymentMethod());
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

    public function testShipping()
    {
        $shipping = array(
            'name' => 'test mann',
            'email_address' => 'testmann@email.com',
            'address_line1' => '123 Test St',
            'address_line2' => '',
            'city' => 'vancouver',
            'province' => 'bc',
            'postal_code' => 'H0H0H0',
            'phone_number' => '1 (555) 555-5555'
        );

        $this->assertSame($this->request, $this->request->setShipping($shipping));
        $this->assertSame($shipping, $this->request->getShipping());
    }

    public function testComplete()
    {
        $this->request->setAmount('10.00');
        $card = array(
            'name' => 'test mann',
            'number' => '4111111111111111',
            'cvd' => '123',
            'expiry_month' => '01',
            'expiry_year' => '2018'
        );

        $this->request->setCard($card);
        $data = $this->request->getData();
        $this->assertSame(false, $data['card']['complete']);
        $this->assertSame('10.00', $this->request->getAmount());
    }

    public function testCardAndCardBillingAddress()
    {
        $this->request->setAmount('10.00');

        $billing1 = array(
            'name' => 'test mann',
            'email_address' => 'testmann@email.com',
            'address_line1' => '123 Test St',
            'address_line2' => '',
            'city' => 'vancouver',
            'province' => 'bc',
            'postal_code' => 'H0H0H0',
            'phone_number' => '1 (555) 555-5555'
        );

        $billing2 = array(
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
        $this->request->setBilling($billing1);
        $data = $this->request->getData();
        $this->assertSame($billing2, $data['billing']);
        $this->assertNotSame($billing1, $data['billing']);
        $this->assertSame('10.00', $this->request->getAmount());
    }

    public function testHttpMethod()
    {
        $this->assertSame('POST', $this->request->getHttpMethod());
    }
}
