<?php
namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model {
  protected $table = 'blogs';
  protected $primaryKey = 'id';

  protected $allowedFields = ['blog_name', 'banner', 'author', 'content', 'is_delete', 'created_at'];
}