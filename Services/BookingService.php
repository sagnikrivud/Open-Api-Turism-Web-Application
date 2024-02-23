<?php

namespace App\Services;
use App\Models\User;
use App\Models\Booking;
use App\Contracts\BookingContract;

class BookingService {
  public $model;

  /**
   * Initiate all models
   *
   * @param Booking $model
   */
  public function __construct(Booking $model)
  {
    $this->model = $model;
    $this->auth = service('authentication');
  }

  /**
   * List of Customer bookings
   *
   * @return void
   */
  public function myTrips()
  {
    return $this->auth->user()->bookings();
  }

  /**
   * Confirm a trip after payment
   *
   * @param [type] $request
   * @return void
   */
  public function confirmTrip($request)
  {

  }

  /**
   * Cancel the trip and refund
   *
   * @param [type] $request
   * @return void
   */
  public function cancelTrip($request)
  {

  }

  /**
   * Fetch Booking details
   *
   * @return void
   */
  public function bookingDetails($bookingNumber)
  {
    return $this->model->where('booking_number', $bookingNumber)->first();
  }
}