<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use App\Models\Otp;

function generateOtpNumber($userId, $purpose='login')
{
  $code = rand(100000, 999999);
  $otpModel = new Otp();
  $data = [
    'otp'     => $code,
    'user_id' => $userId,
    'purpose' => $purpose,
    'expired_at' => date('Y-m-d H:i:s', strtotime('+10 minutes'))
  ];
  $otpModel->insert($data);
  return $code;
}
