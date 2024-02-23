<?php

namespace App\Services;
use App\Models\User;
use App\Contracts\AuthContract;

class AuthService implements AuthContract {
  protected $model;

  protected $user;

  /**
   * Initiate User Model
   *
   * @param User $user
   */
  public function __construct(User $user)
  {
    $this->model = $user;
  }

  /**
   *  Find a Particular user
   *
   * @param [type] $params
   * @return void
   */
  public function findUser($params)
  {

  }
  
  /**
   * Create or Addition of new Customer
   *
   * @return void
   */
  public function userRegister($request)
  {

  }

  /**
   * CustomerLogin from frontend
   *
   * @param [type] $request
   * @return void
   */
  public function userLogin($request)
  {

  }

  /**
   * Send OTP to contact
   *
   * @param [type] $request
   * @return void
   */
  public function validateOtp($request)
  {

  }
}
