<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Addon;
use Illuminate\Support\Facades\DB;

class AddonSeeder extends Seeder
{
    public function run()
    {
        // Hapus data yang ada terlebih dahulu (optional)
        DB::table('addons')->truncate();

        // Data addons
        $addons = [
            [
                'name' => 'Daily Backup',
                'description' => 'Daily backup to keep your data safe.',
                'price' => '20000',
                'billing_cycle' => 'monthly',
                'status' => 'active',
                'order_id' => null  // Set null untuk order_id
            ],
            [
                'name' => 'Email Protection',
                'description' => 'Email protection from spam and malware',
                'price' => '15000',
                'billing_cycle' => 'monthly',
                'status' => 'active',
                'order_id' => null
            ],
        ];

        // Insert data
        foreach ($addons as $addon) {
            Addon::create($addon);
        }
    }
}
