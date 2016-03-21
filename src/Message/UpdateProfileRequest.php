<?php namespace Omnipay\Beanstream\Message;

class UpdateProfileRequest extends CreateProfileRequest
{
    protected function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId();
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }
}
