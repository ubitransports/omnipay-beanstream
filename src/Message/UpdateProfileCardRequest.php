<?php namespace Omnipay\Beanstream\Message;

class UpdateProfileCardRequest extends CreateProfileCardRequest
{
    public function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards/' . $this->getCardId();
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }
}
