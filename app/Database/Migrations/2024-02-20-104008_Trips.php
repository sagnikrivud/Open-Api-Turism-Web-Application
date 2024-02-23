<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trips extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'trip_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'trip_type'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'trip_content'    => [
                'type'           => 'TEXT',
                'constraint'     => 255,
            ],
            'days'            => [
                'type'           => 'INT',
                'null'           => true,
            ],
            'nights'          => [
                'type'           => 'INT',
                'null'           => true,
            ],
            'start_date'      => [
                'type'           => 'DATE',
                'null'           => true,
            ],
            'end_date'        => [
                'type'           => 'DATE',
                'null'           => true,
            ],
            'start_latitude'  => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'start_longitude' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'end_latitude'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'end_longitude'   => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'price_per_person' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'deleted_at'      => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('trips');
    }

    public function down()
    {
        $this->forge->dropTable('trips');
    }
}
