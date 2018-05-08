<?php

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\AbstractResponse;

class FetchTransactionStatusResponse extends Response
{
    public function getTransactionReference()
    {
        return ($this->getStatus() != self::ERROR) ? $this->data['transactionId'] : null;
    }

    public function getMessage()
    {
        return "";
    }
}
