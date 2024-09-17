<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Mengimpor model User
use Illuminate\Support\Facades\Hash; // Mengimpor Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'newadmin@example.com',
            'password' => Hash::make('password123'),
        ]);
        
    }   
}
