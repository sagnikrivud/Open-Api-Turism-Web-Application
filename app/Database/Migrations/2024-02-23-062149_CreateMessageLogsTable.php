<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMessageLogsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'receiver' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'text_message' => [
                'type' => 'TEXT',
            ],
            'purposes' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('message_logs');
    }

    public function down()
    {
        $this->forge->dropTable('message_logs');
    }
}
