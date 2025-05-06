<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $passwordHash = password_hash('admin', PASSWORD_DEFAULT);
        $this->db->table('users')->insert([
            'username' => 'admin',
            'password' => $passwordHash,
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        
        $passwordHash = password_hash('operator', PASSWORD_DEFAULT);
        $this->db->table('users')->insert([
            'username' => 'operator',
            'password' => $passwordHash,
            'role' => 'operator',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
