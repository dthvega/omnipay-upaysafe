<?php

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class Response
 * @package Omnipay\Upaysafe\Message
 */
class PurchaseResponse extends Response implements RedirectResponseInterface
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return $this->getStatus() == self::PENDING;
    }

    /**
     * @return null|string
     */
    public function getRedirectUrl()
    {
        return ($this->isRedirect()) ? $this->data['purchaseUrl'] : null;
    }

    /**
     * @return null|string
     */
    public function getTransactionReference()
    {
        return ($this->isRedirect()) ? $this->data['transactionId'] : null;
    }

    /**
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @return array|void
     */
    public function getRedirectData()
    {
        [];
    }
}
