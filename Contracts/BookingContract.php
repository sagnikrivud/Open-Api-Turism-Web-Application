<?php
namespace App\Contracts;

interface BookingContract {

  /**
   * List of Customer bookings
   *
   * @return void
   */
  public function myTrips();

  /**
   * Confirm a trip after payment
   *
   * @param [type] $request
   * @return void
   */
  public function confirmTrip($request);

  /**
   * Cancel the trip and refund
   *
   * @param [type] $request
   * @return void
   */
  public function cancelTrip($request);

  /**
   * Fetch Booking details
   *
   * @return void
   */
  public function bookingDetails($bookingNumber);

}