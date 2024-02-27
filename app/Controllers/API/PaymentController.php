<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Razorpay\Api\Api as RazorPayClient;
use App\Services\PaymentService;

class PaymentController extends BaseController
{
    public $payment;
    /**
     * Inject Service
     */
    public function __construct()
    {
        $this->payment = new PaymentService();
    }
    
    /**
     * Initiate Payment
     *
     * @return void
     */
    public function makePayment()
    {
        $rawBody = $this->request->getBody();
        $requestData = json_decode($rawBody, true);
        $data = $this->payment->createPayment($requestData);
        return $this->response->setJSON([ 'status' => 200, 'data' => $data]);
    }
}
