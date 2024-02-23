<?php

namespace App\Services;
use App\Models\User;
use App\Models\Booking;

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
  }

  /**
   * List of Customer bookings
   *
   * @return void
   */
  public function myTrips()
  {
    return auth()->user()->bookings();
  }
}