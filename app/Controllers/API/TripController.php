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

    /**
     * Trip Details
     *
     * @param [type] $id
     * @return void
     */
    public function tripAbout($id)
    {
        $data = [];
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }

    /**
     * Search Trip
     *
     * @return void
     */
    public function searchTrip()
    {
        $data = [];
        return $this->response->setJSON(['message' => $data, 'status' => 200]);
    }
}
