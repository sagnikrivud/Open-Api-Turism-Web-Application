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

  public function 
}