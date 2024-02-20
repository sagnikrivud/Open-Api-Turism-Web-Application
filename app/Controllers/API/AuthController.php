<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\AuthService;

class AuthController extends BaseController
{
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
     * User or Customer login via OTP
     *
     * @return void
     */
    public function userLogin()
    {
        return $this->response->setJSON(['message' => 'logged in', 'status' => 200]);
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
