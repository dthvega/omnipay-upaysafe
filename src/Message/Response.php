<?php

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class Response
 * @package Omnipay\Upaysafe\Message
 */
class Response extends AbstractResponse
{
    const APPROVED = "APPROVED";
    const DECLINED = "DECLINED";
    const CANCELED = "CANCELED";
    const PENDING = "PENDING";
    const WAITING = "WAITING";
    const ERROR = "ERROR";

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getStatus()  == self::APPROVED;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->data['status'];
    }
    /**
     * @return null|string
     */
    public function getMessage()
    {
        return $this->data['message'];
    }

    /**
     * @return null|string
     */
    public function getCode()
    {
        return $this->data['code'];
    }
}
