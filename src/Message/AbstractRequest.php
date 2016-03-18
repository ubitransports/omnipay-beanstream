<?php namespace Omnipay\Beanstream\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://www.beanstream.com/api/v1';

    protected function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getApiPasscode()
    {
        return $this->getParameter('apiPasscode');
    }

    public function setApiPasscode($value)
    {
        return $this->setParameter('apiPasscode', $value);
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

    public function setPaymentMethod($value)
    {
        return $this->setParameter('payment_method', $value);
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {
        // Don't throw exceptions for 4xx errors
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpRequest = $this->httpClient->createRequest(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            null,
            json_encode($data)
        );

        $httpResponse = $httpRequest
            ->setHeader('Content-Type', 'application/json')
            ->setHeader('Authorization', 'Passcode ' . base64_encode($this->getMerchantId() . ':' . $this->getApiPasscode()))
            ->send();

        return $this->response = new Response($this, $httpResponse->json());
    }
}
