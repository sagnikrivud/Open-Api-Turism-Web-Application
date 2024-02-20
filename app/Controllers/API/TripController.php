<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TripController extends BaseController
{
    /**
     * List of trips
     *
     * @return void
     */
    public function trips()
    {
        $data = [];
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }
}
