<?php namespace Omnipay\Beanstream\Message;

class FetchProfileRequest extends AbstractProfileRequest
{
    public function getData()
    {
        return [];
    }

    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
