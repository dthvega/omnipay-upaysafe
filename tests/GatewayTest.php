<?php

namespace Omnipay\Upaysafe;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{

    protected $gateway;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway($this->getHttpClient(),$this->getHttpRequest());
    }


    public function testSuccessfullPurchase()
    {
        $this->setMockHttpResponse('PurchasePending.txt');

        $response = $this->gateway->purchase(
          array(
              'amount' => "10.00",
              'currency' => 'USD',
              'birthday' => "2014-01-01",
              //'PaymentMethod' => '',
              'transactionId' => '5af13e5e19c9a',
              'email' => "rickus@testreturn.test",
              'language'  => 'en',
              'returnUrl' => "http://www.testreturn.test",
              'billingFirstName' => "Rickus",
              'billingLastName' => "Vega",
              'billingAddress1' => 'test',
              'billingCity' => 'test',
              'billingPostcode' => '008',
              'billingCountry'    => 'ZA',
          )
        )->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
    }

    public function testFailedPurchase()
    {
        $this->setMockHttpResponse('PurchaseFail.txt');

        $response = $this->gateway->purchase(
          array(
              'amount' => "10.00",
              'currency' => 'USD',
              'birthday' => "2014-01-01",
              //'PaymentMethod' => '',
              'transactionId' => '5af13e5e19c9a',
              'email' => "rickus@testreturn.test",
              'language'  => 'en',
              'returnUrl' => "http://www.testreturn.test",
              'billingFirstName' => "Rickus",
              'billingLastName' => "Vega",
              'billingAddress1' => 'test',
              'billingCity' => 'test',
              'billingPostcode' => '008',
              'billingCountry'    => 'ZA',
          )
        )->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
    }
}
