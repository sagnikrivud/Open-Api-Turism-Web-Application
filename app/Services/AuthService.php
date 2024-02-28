<?php

namespace App\Services;
use App\Models\User;
use App\Contracts\AuthContract;
use Firebase\JWT\JWT;
use App\Models\Otp;
use App\Models\Profile;
use App\Models\Settings;
$logger = service('logger');

class AuthService implements AuthContract {
  protected $model;

  protected $user;

  private $key;

  protected $otp;

  protected $profile;

  protected $setiings;

  /**
   * Initiate User Model
   *
   * @param User $user
   */
  public function __construct(User $user)
  {
    $this->model = $user;
    $this->key = env('JWT_SECRET_KEY');
    $this->otp = new Otp();
    $this->profile = new Profile();
    $this->setiings = new Settings();
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
     helper('Message');
     $this->model->insert($request);
     $profile['user_id'] = $this->model->insertID();
     $this->profile->insert($profile);
     $application = $this->setiings->getSettingsById(1);
     smsNotification($request['phone'], 'Welcome to '.$application['site_name']);
     return true;
  }

  /**
   * CustomerLogin from frontend
   *
   * @param [type] $request
   * @return void
   */
  public function userLogin($phone, $otpCode)
  {
    $user = $this->model->where('phone', $phone)->first();
    if($user!=null){
      $otp = Otp::where('otp', $otpCode)->where('user_id', $user->id)->where('purpose', 'login')->get()->getRow();
      if($otp!=null){
        $data = [];
        $data['token'] = $this->generateToken($user);
        $data['user'] = $user;
        $session = session();
        $session->set('user_id', $user->id);
        return $data;
      }
      return false;
    }
    return false;
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

  /**
   * Generate JWT Auth Token
   *
   * @param array $data
   * @param integer $expiration
   * @return string
   */
  public function generateToken(array $data, int $expiration = 28800): string
  {
        $issuedAt = time();
        $expirationTime = $issuedAt + $expiration;

        $token = JWT::encode([
            'iat'  => $issuedAt,         // Issued at: time when the token was generated
            'exp'  => $expirationTime,   // Token expiration time
            'data' => $data,             // Data to be carried in the token
        ], $this->key);

        return $token;
  }

  /**
   * Send OTP to requested phone number
   *
   * @param [type] $phone
   * @return void
   */
  public function sendOtp($phone)
  {
    helper(['Message', 'Otp']);
    $user = $this->model->where('phone', $phone)->first();
    if($user != null){
      $code = generateOtpNumber($user->id, 'login');
      $message = 'Your OTP is '.$code;
      smsNotification($user->phone, $message);
      return true;
    }
      return false;
  }

  /**
   * Update Customer profile API
   *
   * @param array $request
   * @return void
   */
  public function updateCustomerProfile(array $request)
  {
    $profile['first_name'] = $request['first_name'] ?? null;
    $profile['last_name']  = $request['last_name'] ?? null;
    $profile['doc_type']   = $request['doc_type'] ?? null;
    $profile['doc_number'] = $request['doc_number'] ?? null;
    $this->profile->where('user_id', $request['user_id'])->set($profile_data)->update();
    return true;
  }
}
