<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHomeSections extends Migration
{
    public function up()
    {
        // Services table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'icon'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'link'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME'],
            'updated_at'  => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('services');

        // Clients table
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clients');

        // Portfolio table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'category'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'link'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME'],
            'updated_at'  => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('portfolios');

        // Certified table
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('certifieds');

        // Contact Info table
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'address'    => ['type' => 'TEXT'],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'google_map' => ['type' => 'TEXT'],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME']
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropTable('services');
        $this->forge->dropTable('clients');
        $this->forge->dropTable('portfolios');
        $this->forge->dropTable('certifieds');
        $this->forge->dropTable('contacts');
    }
}
