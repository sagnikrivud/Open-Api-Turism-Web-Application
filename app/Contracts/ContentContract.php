<?php
namespace App\Contracts;


interface ContentContract {
  /**
   * Update application logo From Admin settings
   *
   * @param [type] $fileRequest
   * @return void
   */
  public function updateApplicationLogo($fileRequest);

  /**
   * Fetch Blogs List
   *
   * @return void
   */
  public function blogsList();

  /**
   * Get Content Details
   *
   * @param [type] $title
   * @return void
   */
  public function getContent($title);
}
