<?php
namespace App\Contracts;

interface PaymentContract {
  /**
   * Create Customer for Razorpay
   *
   * @param [type] $user
   * @return void
   */
  public function createCustomer($user);

  /**
   * Initiate Payment
   *
   * @return void
   */
  public function createPayment(array $order);

  /**
   * Refund initiate on cancellation
   *
   * @param array $refundOrder
   * @return void
   */
  public function refundInitiate(array $refundOrder, $invoiceNumber);

  /**
   * Store to Transactions table
   *
   * @param array $order
   * @return void
   */
  public function recordPayment(array $order);

  /**
   * Generate Invoice Code
   *
   * @return void
   */
  public function genInvoice();
}
