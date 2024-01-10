<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        Manufacturer::insert([
            [
                'name' => 'Toyota Motor Corporation',
                'address' => 'HQ, Kyoto District, Tokyo, Japan',
                'phone' => '+1 800 233 8232'
            ],
            [
                'name' => 'BMW Group',
                'address' => 'HQ, Bavaria State, Berlin, Germany',
                'phone' => '+12 234 8552 923'
            ],
        ]);
    }
}
