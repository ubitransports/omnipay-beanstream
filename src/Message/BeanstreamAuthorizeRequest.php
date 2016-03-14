<?php namespace Omnipay\Beanstream\Message;

class BeanstreamAuthorizeRequest extends BeanstreamAbstractRequest
{
    protected $complete = false;

    public function getData()
    {
        $this->validate('amount', 'card');
        $this->getCard()->validate();
        $data = array(
            'amount' => $this->getAmount(),
            'order_number' => $this->getOrderNumber(),
            'language' => $this->getLanguage(),
            'customer_ip' => $this->getClientIp(),
            'term_url' => $this->getTermUrl(),
            'comments' => $this->getComments(),
            'payment_method' => $this->getPaymentMethod(),
            'billing' => array(
                'name' => $this->getCard()->getBillingName(),
                'address_line_1' => $this->getCard()->getBillingAddress1(),
                'address_line_2' => $this->getCard()->getBillingAddress2(),
                'city' => $this->getCard()->getBillingCity(),
                'province' => $this->getCard()->getBillingState(),
                'country' => $this->getCard()->getBillingCountry(),
                'postal_code' => $this->getCard()->getBillingPostcode(),
                'phone_number' => $this->getCard()->getBillingPhone(),
                'email' => $this->getCard()->getEmail(),
            ),
            'shipping' => array(
                'name' => $this->getCard()->getShippingName(),
                'address_line_1' => $this->getCard()->getShippingAddress1(),
                'address_line_2' => $this->getCard()->getShippingAddress2(),
                'city' => $this->getCard()->getShippingCity(),
                'province' => $this->getCard()->getShippingState(),
                'country' => $this->getCard()->getShippingCountry(),
                'postal_code' => $this->getCard()->getShippingPostcode(),
                'phone_number' => $this->getCard()->getShippingPhone(),
                'email' => $this->getCard()->getEmail(),
            )
        );

        if ($this->getCard()) {
            $data['card'] = array(
                'number' => $this->getCard()->getNumber(),
                'name' => $this->getCard()->getName(),
                'expiry_month' => $this->getCard()->getExpiryDate('m'),
                'expiry_year' => $this->getCard()->getExpiryDate('y'),
                'cvd' => $this->getCard()->getCvv(),
                'complete' => ($this->complete),
            );
        }

        if ($this->getPaymentProfile()) {
            $data['payment_profile'] = getPaymentProfile();
            $data['payment_profile']['complete'] = $this->complete;
        }

        if ($this->getToken()) {
            $data['token'] = getToken();
            $data['token']['complete'] = $this->complete;
        }

        return $data;
    }

    public function sendData($data)
    {
        $authHeader = base64_encode("{$this->getMerchantId()}:{$this->getApiPasscode()}");
        $httpResponse = $this->httpClient->post("{$this->getEndpoint()}/payments", null, $data)
            ->setHeader('Authorization', "Passcode $authHeader")
            ->send();
        $this->response = $this->createResponse($httpResponse->json());
        return $this->response;
    }
}
