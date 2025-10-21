<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dina',
            'password' => 'dinaa', // plain text
            'nohp' => '081515405340',
        ]);
    }
}
