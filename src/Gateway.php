<?php

namespace Omnipay\Upaysafe;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Upaysafe';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
            'testMode'  => true
        );
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param mixed $email
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = array())
    {
        return $this->createRequest('\Omnipay\Upaysafe\Message\PurchaseRequest', $options);
    }

    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function fetchTransaction($options = array())
    {
        return $this->createRequest('\Omnipay\Upaysafe\Message\FetchTransactionRequest', $options);
    }

    /**
     * @param array $options
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function fetchTransactionStatus($options = array())
    {
        return $this->createRequest('\Omnipay\Upaysafe\Message\FetchTransactionStatusRequest', $options);
    }

    public function refund(array $options = array())
    {
        return $this->createRequest('\Omnipay\Upaysafe\Message\RefundRequest', $options);
    }
}
