<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
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
            'site_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'contact_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tag_line' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'under_maintenance' => [
                'type' => 'BOOLEAN',
                'default' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
    }

    public function down()
    {
        //
    }
}
