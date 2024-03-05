<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): object
    {
        $data = [
            'message' => 'Welcome to API Collection',
            'status' => true,
            'page' => 'welcome_message',
            'url' => env('APP_URL')
        ];
        return $this->response->setJSON($data);
    }

    /**
     * Site under maintenance
     *
     * @return object
     */
    public function indexNot(): object
    {
        $data = [
            'message' => 'Site under maintenance',
            'status' => false,
            'page' => 'welcome_message',
            'url' => 0
        ];
        return $this->response->setJSON($data);
    }
}
