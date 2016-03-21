<?php namespace Omnipay\Beanstream\Message;

class FetchProfileRequest extends AbstractProfileRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
