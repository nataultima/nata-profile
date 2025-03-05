<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'site_logo' => 'default-logo.png',
            'site_name' => 'Nata Ultima Enggal',
        ];

        $this->db->table('settings')->insert($data);
    }
}
