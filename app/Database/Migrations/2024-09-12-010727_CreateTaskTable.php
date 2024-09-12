<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class CreateTaskTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'completed', 'in_progress'],
                'default' => 'pending',
            ],
            'due_date' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => Time::now()->format(Time::ATOM),
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => Time::now()->format(Time::ATOM),
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}
