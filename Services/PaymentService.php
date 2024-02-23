<?php

namespace App\Services;
use Razorpay\Api\Api as RazorPayClient;
use App\Models\Payment\Payment;
use App\Contracts\PaymentContract;

class PaymentService implements PaymentContract {
  public $client;

  /**
   * Initiate Razorpay
   */
  public function __construct()
  {
    $this->client = new RazorPayClient(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
  }

  /**
   * Create Customer for Razorpay
   *
   * @param [type] $user
   * @return void
   */
  public function createCustomer($user)
  {
   $response = $this->client->customer->create(array('name' => $user['name'], 'email' => $user['email'],'contact'=> $user['phone'],'notes'=> array('notes_key_1'=> 'Trip','notes_key_2'=> 'Payment done')));
   return $response;
  }

  /**
   * Initiate Payment
   *
   * @return void
   */
  public function createPayment(array $order)
  {
    $response = $this->client->order->create(array('receipt' => $order['reciept_number'], 'amount' => $order['amount'], 'currency' => $order['currency'], 'notes'=> array('tag'=> 'trip','description'=> 'Payment confirmed')));
    return $response;
  }
}