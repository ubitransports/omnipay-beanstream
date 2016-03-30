<?php namespace Omnipay\Beanstream\Message;

class DeleteProfileCardRequest extends DeleteProfileRequest
{
    public function getData()
    {
        $this->validate('profile_id');
        $this->validate('card_id');
        return;
    }

    public function testSendSuccess()
    {
        $this->request->setProfileId('8F10Ab54FC434b71972cF2E442c0fb4f');
        $this->request->setCardId('1');
        $this->setMockHttpResponse('DeleteProfileCardSuccess.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame(1, $response->getCode());
        $this->assertSame('Operation Successful', $response->getMessage());
        $this->assertSame('8F10Ab54FC434b71972cF2E442c0fb4f', $response->getCustomerCode());
    }

    public function testSendError()
    {
        $this->request->setProfileId('8F10Ab54FC434b71972cF2E442c0fb4f');
        $this->request->setCardId('1');
        $this->setMockHttpResponse('DeleteProfileCardFailure.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame(44, $response->getCode());
        $this->assertSame(3, $response->getCategory());
        $this->assertSame('Operation failed, no matching card id.', $response->getMessage());
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards/' . $this->getCardId();
    }
}
