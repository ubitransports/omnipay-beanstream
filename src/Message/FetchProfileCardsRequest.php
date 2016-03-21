<?php namespace Omnipay\Beanstream\Message;

class FetchProfileCardRequest extends FetchProfileRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards';
    }
}
