<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): object
    {
        // return view('welcome_message');
        $data = [
            'message' => 'Welcome to CI page',
            'status' => true,
            'page' => 'welcome_message'
        ];
        return $this->response->setJSON($data);
    }
}
