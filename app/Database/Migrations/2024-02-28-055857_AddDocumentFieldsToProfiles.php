<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocumentFieldsToProfiles extends Migration
{
    public function up()
    {
        $fields = [
            'doc_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'last_name',
                'null' => true,
            ],
            'doc_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'doc_type',
                'null' => true,
            ],
        ];

        $this->forge->addColumn('profiles', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('profiles', ['doc_type', 'doc_number']);
    }
}
