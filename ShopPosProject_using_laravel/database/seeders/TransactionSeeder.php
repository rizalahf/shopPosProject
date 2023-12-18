<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++ ) {
            $transaction = new Transaction;

            $transaction->buyer = $faker->name;
            $transaction->product_total = $faker->randomNumber(1);

            $transaction->save();

        }
    }
}
