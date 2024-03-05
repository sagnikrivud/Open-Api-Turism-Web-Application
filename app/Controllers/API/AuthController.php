<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\AuthService;
use CodeIgniter\API\ResponseTrait;

class AuthController extends BaseController
{
    use ResponseTrait;

    protected $auth;

    /**
     * Initialize Auth
     *
     * @param AuthService $auth
     */
    public function __construct()
    {
        $this->auth = new AuthService();
    }

    /**
     * User or Customer Add
     *
     * @return void
     */
    public function userRegister()
    {
        $requestBody = $this->request->getBody();
        $request = json_decode($requestBody, true);
        $data = $this->auth->userRegister($request);
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }

    /**
     * Access token Provider
     *
     * @return void
     */
    public function token()
    {
        $server = new OAuth2Server(
            service('OAuth2\Repositories\ClientRepository'),
            service('OAuth2\Repositories\UserRepository')
        );

        return $this->response->setJSON($server->respondToAccessTokenRequest($this->request, $this->response));
    }

    /**
     * User or Customer login via OTP
     *
     * @return void
     */
    public function userLogin()
    {
        $phone   = $this->request->getPost('phone');
        $otpCode = $this->request->getPost('otp_code');
        $data = $this->auth->userLogin($phone, $otpCode);
        if($data != null){
         return $this->response->setJSON(['message' => $data, 'status' => 200]);
        }else{
         return $this->response->setJSON(['message' => 'Unable to login', 'status' => 505]);
        }
    }

    /**
     * Send OTP to End user for validate Phone
     *
     * @return void
     */
    public function sendOtp()
    {
        $phone   = $this->request->getPost('phone');
        $data = $this->auth->sendOtp($phone);
        if($data){
         return $this->response->setJSON(['message' => 'OTP send successfully', 'warning' => 'Valid for 10 minites', 'status' => 200]);
        }else{
         return $this->response->setJSON(['message' => 'Unable to send', 'status' => 505]);
        }
    }

    /**
     * Validate OTP
     *
     * @return void
     */
    public function validateOtp($userID, $otpCode, $purpose)
    {
        $exist = Otp::where('user_id', $userID)->where('otp', $otpCode)->where('purpose', $purpose)->where('expired_at', '>', now())->first();
        if($exist != null){
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
    public function updateCustomerProfile()
    {
        $requestBody = $this->request->getBody();
        $request = json_decode($requestBody, true);
        $data = $this->auth->updateCustomerProfile($request);
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }
}
