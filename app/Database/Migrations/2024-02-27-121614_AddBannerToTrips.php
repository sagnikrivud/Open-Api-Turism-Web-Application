<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBannerToTrips extends Migration
{
    public function up()
    {
        $this->forge->addColumn('trips', [
            'banner' => [
                'type' => 'VARCHAR',
                'constraint' => 255, // Adjust the constraint as needed
                'after' => 'trip_content',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('trips', 'banner');
    }
}
