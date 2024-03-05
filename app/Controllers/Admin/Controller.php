<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;
use CodeIgniter\Config\Services;

class Controller extends BaseController
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Admin login
     */
    public function adminLogin()
    {
        if ($this->request->getMethod() === 'post'){
         $email = $this->request->getPost('email');
         $password = $this->request->getPost('password');
         $user = new user();
         $adminUser = $user->where('email', $email)->first();
         if ($adminUser && password_verify($password, $adminUser['password'])) {
            return redirect()->to('admin/dashboard');
         }
        }
         return view('admin/login');
    }

    /**
     * Admin dashboard
     *
     * @return string
     */
    public function index(): string
    {
        return view('admin/dashboard');
    }


    /**
     * Update application logo
     *
     * @return boolean
     */
    public function updateApplicationLogo(): bool
    {

    }

    /**
     * Add blog to blog list
     *
     * @return void
     */
    public function addBlogs()
    {

    }

    /**
     * Admin view blog list
     *
     * @return void
     */
    public function viewBlogs()
    {

    }

    /**
     * Delete blog according to ID
     *
     * @param [type] $blogId
     * @return void
     */
    public function delBlog($blogId)
    {

    }

    /**
     * Update title [About me, Contact us, Announcement, Privacy policy]
     *
     * @param [type] $title
     * @return void
     */
    public function updateTitleContent($title)
    {

    }

    /**
     * Customer list for Admin panel
     *
     * @return void
     */
    public function getCustomerList()
    {
        $users = $this->user->where('user_type', 3)->paginate(10);
        $data = [
            'users' => $users,
            'pager' =>  $this->user->pager,
        ];
        return view('users', $data);
    }

    /**
     * Admin logout attempt
     *
     * @return void
     */
    public function adminLogout()
    {
        session()->destroy();
        return redirect()->to('admin/login');
    }

    /**
     * Admin forgot password attempt
     *
     * @return void
     */
    public function adminForgotPassword()
    {
        return view('admin/forgot-password');
    }

    public function adminSMTPSettings()
    {
        return view('admin/smtp-settings');
    }
    public function updateSMTP()
    {
        $smtpHost = $this->request->getPost('smtp_host');
        $smtpUser = $this->request->getPost('smtp_user');
        $smtpPass = $this->request->getPost('smtp_user');
        $mailFrom = $this->request->getPost('mail_from');
        $envPath = FCPATH . '.env';
        if (is_writable($envPath)) {
            $dotenv = Services::dotenv();
            $dotenv->load();

            // Update the desired environment variables
            $dotenv->setVariable('SMTP_HOST', $smtpHost);
            $dotenv->setVariable('SMTP_USER', $smtpUser);
            $dotenv->setVariable('SMTP_PASS', $smtpPass);
            $dotenv->setVariable('MAIL_FROM', $mailFrom);
            $dotenv->save();

            return redirect()->to('admin/smtp-settings')->with('success', 'SMTP credentials updated successfully.');
        } else {
            return redirect()->to('admin/smtp-settings')->with('error', 'Cannot update to the .env file');
        }
    }
}
