<?php namespace Omnipay\Beanstream\Message;

class DeleteProfileCardRequest extends DeleteProfileRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards/' . $this->getCardId();
    }
}
