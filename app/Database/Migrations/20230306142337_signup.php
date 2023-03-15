<?php

namespace App\Database\Migrations;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Migration;

class Signup extends Migration
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
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'gender' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'dob' => [
                'type'       => 'DATE',
                'null'=>false
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'phone' => [
                'type'       => 'BIGINT',
                'null'=>false
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'confirm_pass' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'img_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true
            ],
            'img_path' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'=>true
            ],
            'user_type' => [
                'type'       => 'ENUM("admin","user")',
                'default' =>'user',
                'null'=>false
            ],
            'created_at' => [
                'type'       => 'TIMESTAMP',
                'default' =>Time::now(),
                'null'=>true
            ],
            'updated_at' => [
                'type'       => 'TIMESTAMP',
                'default' =>Time::now(),
                'null'=>true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('signup');
    }

    public function down()
    {
        $this->forge->dropTable('signup');
    }
}