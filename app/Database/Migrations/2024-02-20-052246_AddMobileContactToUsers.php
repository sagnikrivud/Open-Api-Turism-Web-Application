<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMobileContactToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'mobile_contact' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'mobile_contact');
    }
}
