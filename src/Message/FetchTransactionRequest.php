<?php

namespace Omnipay\Upaysafe\Message;


/**
 * Class FetchTransactionRequest
 * @package Omnipay\Upaysafe\Message
 */
class FetchTransactionRequest extends AbstractRequest
{


    /**
     * @return string
     */
    protected function getMethod()
    {
        return '/payment/detail';
    }

    /**
     * @return array|mixed|void
     */
    public function getData()
    {
        $data = array(
            'apiKey' => $this->getApiKey(),
            'referenceNo' => $this->getTransactionId()
        );
        return $data;
    }

    /**
     * @param $data
     * @return FetchTransactionResponse
     */
    public function createResponse($data)
    {

        return new FetchTransactionResponse($this, $data);
    }
}
