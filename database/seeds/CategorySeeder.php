<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index){
            

        	Category::create([
        		'name' -> $faker->unique()->email,
        		'slug' -> $faker->unique()->email,
        		'status' -> $faker->unique()->email,
        	]);
        }
    }
}
