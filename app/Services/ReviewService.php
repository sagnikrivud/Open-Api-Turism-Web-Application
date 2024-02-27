<?php

namespace App\Services;

use App\Models\Review;

class ReviewService {

  protected $model;

  public function __construct(Review $model)
  {
    $this->model = $model;
  }

  /**
   * Submit review
   *
   * @param [type] $request
   * @return void
   */
  public function submitReview($request)
  {

  }
}