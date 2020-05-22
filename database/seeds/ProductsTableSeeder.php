<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $categoriesCount = \App\Category::all()->count();

        for ($i = 0; $i < 10; $i++) {
            \App\Product::insert([
                'categories_id' => rand(1, $categoriesCount),
                'name'          => $faker->word,
                'price'         => $faker->randomFloat('2', '2','999'),
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
