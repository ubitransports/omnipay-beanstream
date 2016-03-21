<?php namespace Omnipay\Beanstream\Message;

class FetchProfileCardsRequest extends FetchProfileRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId() . '/cards';
    }
}
