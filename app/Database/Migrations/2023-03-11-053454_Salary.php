<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Salary extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'bank_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ifsc_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'account_no' => [
                'type'       => 'BIGINT',
                'null'=>false
            ],
            'amount' => [
                'type'       => 'FLOAT',
                'null'=>false
            ],
            'paid_mode' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'ref_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'paid_date' => [
                'type'       => 'TIMESTAMP',
                'null'=>false
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'null'=>false
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('salary');
    }

    public function down()
    {
        $this->forge->dropTable('salary');
    }
}
