<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{   
    // up untuk membuat table users
    public function up()
    {
        $this->forge->addField([
            'uuid'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'name'        => [
                'type'           => 'VARCHAR',
                'constraint'     => 256,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 256,
            ],
            'image' => [
                'type'           => 'VARCHAR',
                'constraint'     => 1028,
                'null' => true,
            ],
            'phone' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'null' => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);	

        $this->forge->addKey('uuid', true);
        $this->forge->createTable('users');
    }

    // fungsi down untuk menghapus tabel users
    public function down()
    {
        $this->forge->dropTable('users');
    }
}
