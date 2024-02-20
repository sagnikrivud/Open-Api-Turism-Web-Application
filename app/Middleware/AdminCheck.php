<?php

namespace App\Middleware;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Middleware\Middleware;
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminCheck extends Middleware {

  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->has('user_type')) {
      $userType = session('user_type');
      if ($userType != 1) {
        throw new PageNotFoundException('You are not authorized', 402);
      }
    }
    return $request;
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Your logic after the controller executes
    return $response;
  }
}