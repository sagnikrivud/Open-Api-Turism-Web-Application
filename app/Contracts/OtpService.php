<?php

namespace App\Services;
use App\Models\Otp;
use App\Models\User;

class OtpService {

  protected $model;

  protected $user;
  /**
   * Initiate Model
   *
   * @param Otp $model
   */
  public function __construct(Otp $model, User $user)
  {
    $this->model = $model;
    $this->user = $user;
    helper(['Otp','Message']);
  }

  /**
   * Random 6 number generate for OTP
   *
   * @return void
   */
  public function generateOtpNumber()
  {
    return rand(100000, 999999);
  }

  public function validateOtp($request)
  {
    $User = $this->user->where('phone', $request->phone)->first();
    if($User != null){
      $otp = $this->model->where('otp', $request->otp_code)->where('user_id', $User->id)->first();
      if($otp != null){
        return true;
      }
      return false;
    }
    return false;
  }

  public function  sendOtpSms($request)
  {
    $otpCode = generateOtpNumber();
    smsNotification($request->phone, 'Use this Code '.$otpCode.' to verify your Mobile.');
    $data = [
      'otp'        => $otpCode,
      'user_id'    => $request->user_id,
      'purpose'    => 'phone verification',
      'expired_at' => date('Y-m-d H:i:s', strtotime('+10 minutes')),
      'created_at' => date('Y-m-d H:i:s'),
    ];
    $this->model->insert($data);
  }
}
