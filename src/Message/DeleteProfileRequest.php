<?php namespace Omnipay\Beanstream\Message;

class DeleteProfileRequest extends AbstractProfileRequest
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
        return 'DELETE';
    }
}
