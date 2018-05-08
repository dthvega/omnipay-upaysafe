<?php

namespace Omnipay\Upaysafe\Message;


class PurchaseRequest extends AbstractRequest
{

    /**
     * Timestamp
     *
     * @var
     */
    private $timestamp;

    /**
     * Returns URL Method
     *
     * @return string
     */
    protected function getMethod()
    {
        return '/initializePayment';
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Customer email address
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->getParameter('birthday');
    }

    /**
     * The customer birth date. 1970-01-01
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBirthday($value)
    {
        return $this->setParameter('birthday', $value);
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }

    /**
     * Valid URL where the client is redirected after payment completion.
     *
     * @param string $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setReturnUrl($value)
    {
        return $this->setParameter('returnUrl', $value);
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    /**
     *
     * Payment Language
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingFirstName()
    {
        return $this->getParameter('billingFirstName');
    }

    /**
     * First name of the customer.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingFirstName($value)
    {
        return $this->setParameter('billingFirstName', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingLastName()
    {
        return $this->getParameter('billingLastName');
    }

    /**
     * Last name of the customer.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingLastName($value)
    {
        return $this->setParameter('billingLastName', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingCompany()
    {
        return $this->getParameter('billingCompany');
    }


    /**
     * The customer company.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingCompany($value)
    {
        return $this->setParameter('billingCompany', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingAddress1()
    {
        return $this->getParameter('billingAddress1');
    }


    /**
     * The customer address 1.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingAddress1($value)
    {
        return $this->setParameter('billingAddress1', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingAddress2()
    {
        return $this->getParameter('billingAddress2');
    }


    /**
     * The customer address 2.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingAddress2($value)
    {
        return $this->setParameter('billingAddress2', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->getParameter('billingCity');
    }

    /**
     * The customer city.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingCity($value)
    {
        return $this->setParameter('billingCity', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingPostcode()
    {
        return $this->getParameter('billingPostcode');
    }

    /**
     * The customer zip code.
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingPostcode($value)
    {
        return $this->setParameter('billingPostcode', $value);
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->getParameter('billingCountry');
    }

    /**
     * The customer country 2 characters. e.g. ZA
     *
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setBillingCountry($value)
    {
        return $this->setParameter('billingCountry', $value);
    }

    /**
     * @return mixed|string
     */
    public function getPaymentMethod()
    {
        return $this->getParameter('paymentMethod');
    }

    /**
     * Default selected payment method
     *
     * @param string $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setPaymentMethod($value)
    {
        return $this->setParameter('paymentMethod', $value);
    }

    /**
     * @return array|mixed|void
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'email',
            'transactionId',
            'returnUrl',
            'billingFirstName',
            'billingLastName',
            'billingAddress1',
            'billingCity',
            'billingPostcode',
            'billingCountry',
            'birthday'
        );

        $data = array(
            'apiKey' => $this->getApiKey(),
            'email'   => $this->getEmail(),
            'birthday' => $this->getBirthDay(),
            'amount'   => $this->getAmountInteger(),
            'currency'  => $this->getCurrency(),
            'returnUrl' => $this->getReturnUrl(),
            'referenceNo' => $this->getTransactionId(),
            'language'    => $this->getLanguage(),
            'billingFirstName'    => $this->getBillingFirstName(),
            'billingLastName'    => $this->getBillingLastName(),
            'billingCompany'    => $this->getBillingCompany(),
            'billingAddress1'   => $this->getBillingAddress1(),
            'billingAddress2'   => $this->getBillingAddress2(),
            'billingCity'       => $this->getBillingCity(),
            'billingPostcode'   => $this->getBillingPostcode(),
            'billingCountry'    => $this->getBillingCountry(),
            'paymentMethod'     => $this->getPaymentMethod()
        );

        return $data;
    }

    public function createResponse($data)
    {
        return new PurchaseResponse($this, $data);
    }
}
