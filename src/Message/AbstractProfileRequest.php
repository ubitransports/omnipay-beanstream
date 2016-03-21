<?php namespace Omnipay\Beanstream\Message;

class AbstractProfileRequest extends AbstractRequest
{
    protected $endpoint = 'https://www.beanstream.com/api/v1/profile';

    public function getProfileId()
    {
        return $this->getParameter('profileId');
    }

    public function setProfileId($value)
    {
        return $this->setParameter('profileId', $value);
    }
}
