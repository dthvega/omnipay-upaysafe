<?php
/**
 * Created by PhpStorm.
 * User: rickus
 * Date: 2018/05/08
 * Time: 9:51 AM
 */

namespace Omnipay\Upaysafe\Message;


use Omnipay\Tests\TestCase;

class FetchTransactionStatusRequestTest extends TestCase
{
    protected $request;
    public function setUp()
    {
        $this->request = new FetchTransactionStatusRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
                'transactionId' => 'test123',
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();
        $this->assertSame('test123',$data['referenceNo']);
    }

    public function testApprovedStatus()
    {
        $this->setMockHttpResponse('StatusSuccessful.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame('APPROVED',$response->getStatus());
    }

    public function testPendingStatus()
    {
        $this->setMockHttpResponse('StatusPending.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame('PENDING',$response->getStatus());
    }

    public function testDeclinedStatus()
    {
        $this->setMockHttpResponse('StatusFail.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame('DECLINED',$response->getStatus());
    }
}