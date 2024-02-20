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
            ],
            'days'            => [
                'type'           => 'INT',
            ],
            'nights'          => [
                'type'           => 'INT',
            ],
            'start_date'      => [
                'type'           => 'DATE',
            ],
            'end_date'        => [
                'type'           => 'DATE',
            ],
            'start_latitude'  => [
                'type'           => 'VARCHAR',
            ],
            'start_longitude' => [
                'type'           => 'VARCHAR',
            ],
            'end_latitude'    => [
                'type'           => 'VARCHAR',
            ],
            'end_longitude'   => [
                'type'           => 'VARCHAR',
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
        //
    }
}
