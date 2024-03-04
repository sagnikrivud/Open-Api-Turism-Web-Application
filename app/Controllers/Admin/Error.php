<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Error extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 500 Server Errors
     *
     * @return void
     */
    public function error_500()
    {
        $this->load->view('admin/errors/500_admin');
    }
}
