<?php namespace Omnipay\Beanstream;

use Omnipay\Common\AbstractGateway;

/**
 * Beanstream Gateway
 *
 * @link https://www.beanstream.com/
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Beanstream';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantId' => '',
            'apiPasscode' => '',
            'username' => '',
            'password' => ''
        );
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getApiPasscode()
    {
        return $this->getParameter('apiPasscode');
    }

    public function setApiPasscode($value)
    {
        return $this->setParameter('apiPasscode', $value);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Beanstream\Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Beanstream\Message\AuthorizeRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Beanstream\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Beanstream\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Beanstream\Message\CreateProfileRequest
     */
    public function createProfile(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Beanstream\Message\CreateProfileRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Beanstream\Message\FetchProfileRequest
     */
    public function fetchProfile(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Beanstream\Message\FetchProfileRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Beanstream\Message\UpdateProfileRequest
     */
    public function updateProfile(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Beanstream\Message\UpdateProfileRequest', $parameters);
    }
}
