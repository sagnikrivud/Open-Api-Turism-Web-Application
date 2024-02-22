<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BookingController extends BaseController
{
    /**
     * Client Booking list
     *
     * @return void
     */
    public function myTrips()
    {
        $data = [];
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }

    /**
     * Confirm and submit Trip details
     *
     * @return void
     */
    public function confirmTrip()
    {
        $data = [];
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }

    /**
     * Cancel trip API
     *
     * @return void
     */
    public function cancelTrip()
    {
        $data = [];
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }
}
