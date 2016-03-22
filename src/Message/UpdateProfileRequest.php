<?php namespace Omnipay\Beanstream\Message;

class UpdateProfileRequest extends CreateProfileRequest
{
    public function getEndpoint()
    {
        return $this->endpoint . '/' . $this->getProfileId();
    }

    public function getHttpMethod()
    {
        return 'PUT';
    }
}
