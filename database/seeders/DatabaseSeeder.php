<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker =\Faker\Factory::create();

        for ($i = 0; $i <100; $i++){
            $id = $faker->unique->regexify('1[0-9]{11}');
            $product_name = $faker->word;
            $description = $faker->sentence(20);
            $retail_price = $faker->randomFloat(2, 10, 1000);
            $wholesale_price = $faker->randomFloat(2, 5, 500);
            $origin = $faker->countryCode;
            $quantity = $faker->numberBetween(0, 100);
            $created_at = $faker->dateTimeBetween('-2 year', 'now');

            DB::table('products')->insert([
                'id' => $id,
                'product_name' => $product_name,
                'description' => $description,
                'retail_price' => $retail_price,
                'wholesale_price' => $wholesale_price,
                'origin' => $origin,
                'quantity' => $quantity,
                'created_at' => $created_at,
            ]);
        }
    }
}
