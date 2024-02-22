<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): object
    {
        $data = [
            'message' => 'Welcome to CI page',
            'status' => true,
            'page' => 'welcome_message'
        ];
        return $this->response->setJSON($data);
    }
}
