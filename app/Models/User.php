<?php
namespace App\Models;

use CodeIgniter\Model;

class User extends Model {
  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $allowedFields = ['user_type', 'name', 'email', 'password'];
}