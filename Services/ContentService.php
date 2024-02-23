<?php

namespace App\Services;
use App\Models\Settings;
use App\Models\Blog;
use App\Contracts\ContentContract;
use App\Models\Content;

class ContentService implements ContentContract {

  protected $settings;

  protected $model;

  protected $blog;

  protected $content;

  public function __construct(Settings $settings, Blog $blog, Content $content)
  {
    $this->model = $settings;
    $this->blog = $blog;
    $this->content = $content;
  }

  /**
   * Update application logo From Admin settings
   *
   * @param [type] $fileRequest
   * @return void
   */
  public function updateApplicationLogo($fileRequest)
  {
    if ($fileRequest->isValid() && $fileRequest->hasFile('logo')) {
      $logoFile = $fileRequest->getFile('logo');
      $oldLogoPath = $this->model->getLogoPath();
      if ($oldLogoPath && is_file($oldLogoPath)) {
        unlink($oldLogoPath);
      }
      $logoFile->move('public/logo', $logoName);
      $this->model->updateLogo('public/logo/' . $logoName);
      return true;
    }
      return false;
  }

  /**
   * Fetch Blogs List
   *
   * @return void
   */
  public function blogsList()
  {
    $data['blogs'] = $this->blog->paginate(10);
    $data['pager'] = $this->blog->pager;
    return $data;
  }

  /**
   * Get Content details
   *
   * @return void
   */
  public function getContent($title)
  {
    return $this->content->where('title', $title)->first();
  }
}

