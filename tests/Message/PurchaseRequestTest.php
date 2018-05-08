<?php

namespace Omnipay\Upaysafe\Message;

use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{

    public function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
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
        );
    }

    public function testGetData()
    {
        $this->assertSame(1000,$this->request->getData()['amount']) ;
    }

    public function testSend()
    {
        $this->setMockHttpResponse('PurchasePending.txt');

        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
    }


}