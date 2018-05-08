<?php
/**
 * Created by PhpStorm.
 * User: rickus
 * Date: 2018/05/08
 * Time: 7:26 AM
 */

namespace Omnipay\Upaysafe\Message;


class RefundRequest extends AbstractRequest
{

    public function getMethod()
    {
        return '/payment/refund';
    }

    public function getData()
    {
        $this->validate('transactionReference', 'transactionId');
        $data = array(
         'apiKey' => $this->getApiKey(),
         'transactionId'  => $this->getTransactionReference(),
         'referenceNo'    => $this->getTransactionId(),
         'amount'         => $this->getAmountInteger(),
         'currency'       => $this->getCurrency()
        );
        return $data;
    }

    public function createResponse($data)
    {
        return new RefundResponse($this, $data);
    }
}
