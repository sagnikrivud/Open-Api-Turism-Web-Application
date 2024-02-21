<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $userData = [
            'email'     => 'admin@admin.com',
            'password'  => password_hash('password1234', PASSWORD_DEFAULT),
            'user_type' => 1,
            'name'      => 'super_admin'
        ];
        $this->db->table('users')->insert($userData);
        $userId = $this->db->insertID();
        $profileData = [
            'user_id' => $userId,
            'first_name'    => 'super_admin',
        ];
        $this->db->table('profiles')->insert($profileData);
    }
}
