<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'JNK Admin',
            'email' => 'support@jnkwwe.com',
            'password' => Hash::make('Admin@123'),
        ]);
    }
}
