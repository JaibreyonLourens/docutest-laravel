<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for( $i = 0; $i < 3; $i++ ) {
            \App\Category::insert([
                'name'          => $faker->word,
                'description'   => $faker->paragraph('5')
            ]);
        }
    }
}
