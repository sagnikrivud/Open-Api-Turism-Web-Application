<?php

namespace App\Services;

use App\Models\Review;

class ReviewService {

  protected $model;

  public function __construct()
  {
    $this->model = new Review();
  }

  /**
   * Submit review
   *
   * @param [type] $request
   * @return void
   */
  public function submitReview(array $request)
  {

  }
}