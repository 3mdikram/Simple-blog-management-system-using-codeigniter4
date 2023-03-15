<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostNews extends Migration
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
            'news_title' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null'=>true
            ],
            'news_message' => [
                'type'       => 'LONGTEXT',
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
            'deleted_at' => [
                'type'       => 'TIMESTAMP',
                'null'=>true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('postnews');

    }

    public function down()
    {
        $this->forge->dropTable('postnews');
    }
}
