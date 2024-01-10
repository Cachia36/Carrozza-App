<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::insert([
            ['model' => 'Camry',
             'year' => 2010,
             'salesperson_email'=> 'joe@carozza.com',
             'manufacturer_id'=> '1',
            ],
            ['model' => 'Hilux',
             'year' => 2020,
             'salesperson_email'=> 'mary@carozza.com',
             'manufacturer_id'=> '1',
            ],
            ['model' => '330i',
             'year' => 2021,
             'salesperson_email'=> 'mary@carozza.com',
             'manufacturer_id'=> '2',
            ],
        ]);
    }
}
