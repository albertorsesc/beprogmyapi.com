<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Alberto Rosas',
                'email' => 'alberto.rsesc@protonmail.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        ];

        User::insert($users);
    }
}
