<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\BookingService;

class BookingController extends BaseController
{
    protected $booking;

    public function __construct()
    {
        $this->booking = new BookingService();
    }
    /**
     * Client Booking list
     *
     * @return void
     */
    public function myTrips()
    {
        $data = $this->booking->myTrips();
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }

    /**
     * Confirm and submit Trip details
     *
     * @return void
     */
    public function confirmTrip()
    {
        $request = $this->request->getPost();
        $data = $this->booking->confirmTrip($request);
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }

    /**
     * Cancel trip API
     *
     * @return void
     */
    public function cancelTrip()
    {
        $request = $this->request->getPost();
        $data = $this->booking->cancelTrip($request);
        return $this->response->setJSON(['data' => $data, 'status' => 200]);
    }

    /**
     * Post review
     *
     * @return void
     */
    public function reviewTrip()
    {
        return $this->response->setJSON(['message' => 'Submitted', 'status' => 200]);
    }
}
