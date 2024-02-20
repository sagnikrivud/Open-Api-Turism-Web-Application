<?php
namespace App\Models;

use CodeIgniter\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';

    protected $allowedFields = [];

    /**
     * Get Application logo
     *
     * @return void
     */
    public function getLogo()
    {
        return $this->select('logo')->first();
    }
}