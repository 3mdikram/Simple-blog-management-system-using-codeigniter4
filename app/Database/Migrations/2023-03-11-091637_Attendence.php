<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendence extends Migration
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
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'=>false
            ],
            'work_stime' => [
                'type'       => 'TIME',
                'null'=>true
            ],
            'work_endtime' => [
                'type'       => 'TIME',
                'null'=>true
            ],
            'total_hours' => [
                'type'       => 'FLOAT',
                'null'=>true
            ],
            'current_date' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
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
        $this->forge->createTable('attendence');
    }

    public function down()
    {
        $this->forge->dropTable('attendence');
    }
}
