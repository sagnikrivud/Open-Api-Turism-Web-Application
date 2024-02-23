<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOtpTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'otp'        => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'user_id'    => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'purpose'    => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'expired_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('otp');
    }

    public function down()
    {
        $this->forge->dropTable('otp');
    }
}
