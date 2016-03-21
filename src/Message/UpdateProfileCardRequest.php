<?php namespace Omnipay\Beanstream\Message;

class UpdateProfileCardRequest extends CreateProfileCardRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards/' . $this->getCardId();
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }
}
