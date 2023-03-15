<?php

namespace App\Database\Migrations;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Migration;

class Bank extends Migration
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
                'null' =>false
            ],
            'users_id' => [
                'type'       => 'BIGINT',
                'null' =>false
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
            'deleted_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bank');

    }

    public function down()
    {
        $this->forge->dropTable('bank');
    }
}
