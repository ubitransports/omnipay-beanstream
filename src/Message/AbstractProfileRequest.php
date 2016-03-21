<?php namespace Omnipay\Beanstream\Message;

class AbstractProfileRequest extends AbstractRequest
{
    protected $endpoint = 'https://www.beanstream.com/api/v1/profiles';

    public function getProfileId()
    {
        return $this->getParameter('profileId');
    }

    public function setProfileId($value)
    {
        return $this->setParameter('profileId', $value);
    }

    public function getCardId()
    {
        return $this->getParameter('cardId');
    }

    public function setCardId($value)
    {
        return $this->setParameter('cardId', $value);
    }
}
