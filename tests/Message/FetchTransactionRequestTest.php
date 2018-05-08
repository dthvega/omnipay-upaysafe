<?php
/**
 * Created by PhpStorm.
 * User: rickus
 * Date: 2018/05/08
 * Time: 10:17 AM
 */

namespace Omnipay\Upaysafe\Message;


use Omnipay\Tests\TestCase;

class FetchTransactionRequestTest extends TestCase
{

    protected $request;
    public function setUp()
    {
        $this->request = new FetchTransactionRequest($this->getHttpClient(), $this->getHttpRequest());
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
        $this->setMockHttpResponse('DetailsSuccessful.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertSame('APPROVED',$response->getStatus());
        $this->assertSame('Approved',$response->getMessage());
    }

    public function testPendingStatus()
    {
        $this->setMockHttpResponse('DetailsPending.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame('PENDING',$response->getStatus());
        $this->assertSame('Waiting',$response->getMessage());
    }

    public function testDeclinedStatus()
    {
        $this->setMockHttpResponse('DetailsFail.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertSame('DECLINED',$response->getStatus());
        $this->assertSame('Decline',$response->getMessage());
    }
}