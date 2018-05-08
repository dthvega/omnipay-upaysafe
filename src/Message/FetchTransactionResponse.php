<?php

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\AbstractResponse;

class FetchTransactionResponse extends Response
{

    /**
     * @return null|string
     */
    public function getTransactionReference()
    {
        return ($this->getStatus() != self::ERROR) ? $this->data['transactionId'] : null;
    }

    /**
     * @return null|string
     */
    public function getTransactionId()
    {
        return ($this->getStatus() != self::ERROR) ? $this->data['referenceNo'] : null;
    }
}
