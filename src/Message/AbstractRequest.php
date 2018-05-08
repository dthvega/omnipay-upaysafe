<?php

namespace Omnipay\Upaysafe\Message;


use Omnipay\Common\Message\ResponseInterface;

/**
 * Class AbstractRequest
 * @package Omnipay\Upaysafe\Message
 */
class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    /**
     * @var string
     */
    protected static $live_endpoint = 'https://api.upaysafepayment.com/pw/v3';

    /**
     * @var string
     */
    protected static $test_endpoint = 'https://testapi.upaysafepayment.com/pw/v3';

    /**
     * @return string
     */
    protected function getEndpoint()
    {

        if ($this->getTestMode()) {
            return self::$test_endpoint.$this->getMethod();
        }
        return self::$live_endpoint.$this->getMethod();
    }

    /**
     * @param mixed $data
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $this->httpClient->getEventDispatcher()->addListener(
            'request.error',
            function ($event) {
                if ($event['response']->isClientError()) {
                    $event->stopPropagation();
                }
            }
        );

        $httpRequest = $this->httpClient->createRequest(
            'POST',
            $this->getEndpoint(),
            [],
            $data
        );

        $httpResponse  = $httpRequest->send();
        $data = $httpResponse->json();


        return $this->createResponse($data);
    }

    /**
     * @return mixed|void
     */
    public function getData()
    {

    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param $value
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param $data
     * @return Response
     */
    public function createResponse($data)
    {
        return new Response($this, $data);
    }
}
