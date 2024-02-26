<?php

namespace App\Services;
use Razorpay\Api\Api as RazorPayClient;
use App\Models\Payment\Payment;
use App\Contracts\PaymentContract;

class PaymentService implements PaymentContract {
  public $client;

  protected $model;

  /**
   * Initiate Razorpay
   */
  public function __construct(Payment $model)
  {
    $this->client = new RazorPayClient(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
    $this->model = $model;
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
    $order['invoice_number'] = $this->genInvoice();
    $response = $this->client->order->create(array('receipt' => $order['invoice_number'], 'amount' => $order['amount'], 'currency' => $order['currency'], 'notes'=> array('tag'=> 'trip','description'=> 'Payment confirmed')));
    if($response){
      $order['razorpay_response'] = $response;
      $this->recordPayment($order);
    }
    return $response;
  }

  /**
   * Refund initiate on cancellation
   *
   * @param array $refundOrder
   * @return void
   */
  public function refundInitiate(array $refundOrder)
  {

  }

  /**
   * Store to Transactions table
   *
   * @param array $order
   * @return void
   */
  public function recordPayment(array $order)
  {
    $return = $this->model->insert($order);
    return $return->insertID();
  }

  /**
   * Generate Invoice Code
   *
   * @return void
   */
  public function genInvoice()
  {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
  }
}