<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): object
    {
        $data = [
            'message' => 'Welcome to API Collection',
            'status' => true,
            'page' => 'welcome_message'
        ];
        return $this->response->setJSON($data);
    }

    public function indexNot(): object
    {
        $data = [
            'message' => 'Site under maintenance',
            'status' => false,
            'page' => 'welcome_message'
        ];
        return $this->response->setJSON($data);
    }
}
