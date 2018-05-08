<?php
/**
 * Created by PhpStorm.
 * User: rickus
 * Date: 2018/05/08
 * Time: 9:28 AM
 */

namespace Omnipay\Upaysafe\Message;

use Omnipay\Tests\TestCase;

class RefundRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new RefundRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
            'transactionId' => '123456',
            'transactionReference' => '12345-1234567890-123'
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();
        $this->assertSame('123456',$data['referenceNo']);
        $this->assertSame('12345-1234567890-123',$data['transactionId']);
    }

    public function testApprovedRefund()
    {
        $this->setMockHttpResponse('RefundApproved.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
    }

    public function testDeclinedRefund()
    {
        $this->setMockHttpResponse('RefundDeclined.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
    }
}