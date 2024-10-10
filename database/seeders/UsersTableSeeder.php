<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $adminRole = Role::where('name', 'admin')->first();
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin_password'), // Change to your desired password
            'google_id' => null, // Admin won't use Google login
            'google_token' => null,
            'google_refresh_token' => null,
        ]);
        $admin->roles()->attach($adminRole);

        // Create client user
        $clientRole = Role::where('name', 'client')->first();
        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => bcrypt('client_password'), // Change to your desired password
            'google_id' => null, // Client won't use Google login
            'google_token' => null,
            'google_refresh_token' => null,
        ]);
        $client->roles()->attach($clientRole);
    }
}
