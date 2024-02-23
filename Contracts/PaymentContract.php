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
}
