<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nip' => '12345678',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'is_admin' => '1',
                'telp' => '088210715941',
                'password' => bcrypt('admin123'),
            ],
            [
                'nip' => '12345677',
                'username' => 'petugas',
                'email' => 'petugas@gmail.com',
                'is_admin' => '0',
                'telp' => '088210715941',
                'password' => bcrypt('petugas123'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
