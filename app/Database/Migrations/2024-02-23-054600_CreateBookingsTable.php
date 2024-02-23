<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
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
            'booking_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'model_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'trip_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'additional_details' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'starting_point' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'destination_point' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'persons' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'trip_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'discount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'in-progress', 'completed', 'cancelled'],
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
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
