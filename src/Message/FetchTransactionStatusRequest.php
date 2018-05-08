<?php

namespace Omnipay\Upaysafe\Message;


class FetchTransactionStatusRequest extends FetchTransactionRequest
{

    protected function getMethod()
    {
        return '/payment/status';
    }

    public function createResponse($data)
    {
        return new FetchTransactionResponse($this, $data);
    }
}
