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
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }

    /**
     * User or Customer Add
     *
     * @return void
     */
    public function userRegister()
    {
        return $this->response->setJSON(['message' => 'welcome', 'status' => 200]);
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
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }

    /**
     * Send OTP to End user for validate Phone
     *
     * @return void
     */
    public function sendOtp()
    {
        return $this->response->setJSON(['message' => 'OTP send successfully', 'status' => 200]);
    }

    /**
     * Validate OTP
     *
     * @return void
     */
    public function validateOtp()
    {

    }
}
