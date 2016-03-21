<?php namespace Omnipay\Beanstream\Message;

class CreateProfileRequest extends AbstractProfileRequest
{
    public function getData()
    {
        $this->getCard()->validate();

        $data = array(
            'language' => $this->getLanguage(),
            'comment' => $this->getComments(),
            'billing' => array(
                'name' => $this->getCard()->getBillingName(),
                'address_line1' => $this->getCard()->getBillingAddress1(),
                'address_line2' => $this->getCard()->getBillingAddress2(),
                'city' => $this->getCard()->getBillingCity(),
                'province' => $this->getCard()->getBillingState(),
                'country' => $this->getCard()->getBillingCountry(),
                'postal_code' => $this->getCard()->getBillingPostcode(),
                'phone_number' => $this->getCard()->getBillingPhone(),
                'email_address' => $this->getCard()->getEmail(),
            )
        );

        if ($this->getCard()) {
            $data['card'] = array(
                'number' => $this->getCard()->getNumber(),
                'name' => $this->getCard()->getName(),
                'expiry_month' => $this->getCard()->getExpiryDate('m'),
                'expiry_year' => $this->getCard()->getExpiryDate('y'),
                'cvd' => $this->getCard()->getCvv(),
            );
        }

        if ($this->getToken()) {
            $data['token'] = $this->getToken();
        }

        return $data;
    }

    public function getHttpMethod()
    {
        return 'POST';
    }
}
