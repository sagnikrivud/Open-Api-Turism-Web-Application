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
}
