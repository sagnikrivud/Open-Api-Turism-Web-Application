<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBannerFieldToSettings extends Migration
{
    public function up()
    {
        $this->forge->addColumn('settings', [
            'banner' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'logo',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('settings', 'banner');
    }
}
