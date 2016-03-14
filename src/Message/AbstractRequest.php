<?php namespace Omnipay\Beanstream\Message;

use Omnipay\Common\CreditCard;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://www.beanstream.com/api/v1';

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getOrderNumber()
    {
        return $this->getParameter('order_number');
    }

    public function setOrderNumber($value)
    {
        return $this->setParameter('order_number', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getComments()
    {
        return $this->getParameter('comments');
    }

    public function setComments($value)
    {
        return $this->setParameter('comments', $value);
    }

    public function getTermUrl()
    {
        return $this->getParameter('term_url');
    }

    public function setTermUrl($value)
    {
        return $this->setParameter('term_url', $value);
    }

    public function getPaymentProfile()
    {
        return $this->getParameter('payment_profile');
    }

    public function setPaymentProfile($value)
    {
        return $this->setParameter('payment_profile', $value);
    }

    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setToken($value)
    {
        return $this->setParameter('token', $value);
    }

    public function getPaymentMethod()
    {
        return $this->getParameter('payment_method');
    }

    public function setToken($value)
    {
        return $this->setParameter('payment_method', $value);
    }

    public function getTestEndpoint()
    {
        return $this->testEndpoint;
    }

    public function getLiveEndpoint()
    {
        return $this->liveEndpoint;
    }

    protected function createResponse($response)
    {
        return $this->response = new BeanstreamResponse($this, $response);
    }
}
