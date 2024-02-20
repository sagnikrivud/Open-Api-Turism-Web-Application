<?php

namespace App\Services;
use App\Models\Settings;

class ContentService {

  protected $settings;

  protected $model;

  public function __construct(Settings $settings)
  {
    $this->model = $settings;
  }

  public function updateApplicationLogo($fileRequest)
  {

  }

  public function blogsList()
  {
    
  }
}

