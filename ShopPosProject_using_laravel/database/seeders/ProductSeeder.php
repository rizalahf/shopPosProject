<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++ ) {
            $product = new Product;

            $product->product_name = $faker->companySuffix;
            $product->price = $faker->randomNumber(5);
            $product->qty = $faker->randomNumber(3);
            $product->status = 'Aktif';

            $product->save();

        }
    }
}
