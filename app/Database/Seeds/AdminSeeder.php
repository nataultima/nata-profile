<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('admin123', PASSWORD_DEFAULT);

        $data = [
            'username' => 'admin',
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insert ke tabel users
        $this->db->table('users')->insert($data);
    }
}
