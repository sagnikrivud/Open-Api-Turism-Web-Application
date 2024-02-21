<?php

namespace App\Services;
use App\Models\Settings;
use App\Models\Blog;

class ContentService {

  protected $settings;

  protected $model;

  protected $blog;

  public function __construct(Settings $settings, Blog $blog)
  {
    $this->model = $settings;
    $this->blog = $blog;
  }

  /**
   * Update application logo From Admin settings
   *
   * @param [type] $fileRequest
   * @return void
   */
  public function updateApplicationLogo($fileRequest)
  {

  }

  /**
   * Fetch Blogs List
   *
   * @return void
   */
  public function blogsList()
  {
    
  }
}

