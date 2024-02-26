<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBookingIdToTransactions extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transactions', [
            'booking_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'after' => 'id',
            ],
        ]);

        // Add foreign key constraint
        $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('transactions', 'transactions_booking_id_foreign');

        // Remove the 'booking_id' column
        $this->forge->dropColumn('transactions', 'booking_id');
    }
}
