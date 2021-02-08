<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,50) as $index){
        	Post::create([
        		'user_id' -> $faker->unique()->email,
        		'category_id' -> $faker->unique()->email,
        		'title' -> $faker->sentence,
        		'content' -> $faker->paragraph,
        		'thumbnail' -> $faker->imageUrl(),
        		'status' -> $this->getRandomStatus(),
        	]);
        }
    }


    public function getRandomStatus()
    {
        $statuses = array('draft','published');
        return $statuses[array_rand($statuses)];
    }
}
