<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContentsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => 'about-us',         'content' => ''],
            ['title' => 'contact',          'content' => ''],
            ['title' => 'announcement',     'content' => ''],
            ['title' => 'Travel blogs',     'content' => ''],
            ['title' => 'Privacy policy',   'content' => ''],
        ];
        $this->db->table('contents')->insertBatch($data);
    }
}
