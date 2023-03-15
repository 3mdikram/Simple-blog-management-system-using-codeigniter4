<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todolist extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null'=>true
            ],
            'item' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null'=>true
            ],
            'issue_by' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null'=>true
            ],
            'created_at' => [
                'type'       => 'DATE',
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
        $this->forge->createTable('todolist');

    }

    public function down()
    {
        $this->forge->dropTable('todolist');
    }
}
