<?php
/**
 * Created by PhpStorm.
 * User: rickus
 * Date: 2018/05/08
 * Time: 7:52 AM
 */

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\AbstractResponse;

class RefundResponse extends Response
{

    public function getTransactionReference()
    {
        return $this->data['transactionId'];
    }
}
