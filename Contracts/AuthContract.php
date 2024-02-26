<?php
namespace App\Contracts;

interface AuthContract {
  /**
   * Find a Particular user
   *
   * @param [type] $params
   * @return void
   */
  public function findUser($params);

  /**
   * Create or Addition of new Customer
   *
   * @return void
   */
  public function userRegister($request);

  /**
   * CustomerLogin from frontend
   *
   * @param [type] $request
   * @return void
   */
  public function userLogin($request);

  /**
   * Send OTP to contact
   *
   * @param [type] $request
   * @return void
   */
  public function validateOtp($request);

  /**
   * Generate JWT Auth Token
   *
   * @param array $data
   * @param integer $expiration
   * @return string
   */
  public function generateToken(array $data, int $expiration = 3600): string;
}
