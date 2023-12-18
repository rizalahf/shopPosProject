<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++ ) {
            $suplier = new Suplier;

            $suplier->suplier_name = $faker->company;
            $suplier->address = $faker->address;

            $suplier->save();

        }
    }
}
