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
    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }
    
    /**
     * Initiate Payment
     *
     * @return void
     */
    public function makePayment()
    {
        
    }
}
