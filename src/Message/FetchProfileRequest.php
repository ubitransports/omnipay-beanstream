<?php namespace Omnipay\Beanstream\Message;

class FetchProfileRequest extends AbstractProfileRequest
{
    public function getData()
    {
        return array();
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
