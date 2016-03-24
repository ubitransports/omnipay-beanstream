<?php namespace Omnipay\Beanstream\Message;

abstract class AbstractProfileRequest extends AbstractRequest
{
    protected $endpoint = 'https://www.beanstream.com/api/v1/profiles';

    public function getProfileId()
    {
        return $this->getParameter('profile_id');
    }

    public function setProfileId($value)
    {
        return $this->setParameter('profile_id', $value);
    }

    public function getCardId()
    {
        return $this->getParameter('card_id');
    }

    public function setCardId($value)
    {
        return $this->setParameter('card_id', $value);
    }

    public function getComment()
    {
        return $this->getParameter('comment');
    }

    public function setComment($value)
    {
        return $this->setParameter('comment', $value);
    }
}
