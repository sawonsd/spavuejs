<?php

use Illuminate\Database\Seeder;
use App\Post;

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
        		'user_id' => rand(1,10),
        		'category_id' => rand(1,10),
        		'title' => $faker->sentence,
        		'content' => $faker->paragraph,
        		'thumbnail' => $faker->imageUrl(),
        		'status' => $this->getRandomStatus(),
        	]);
        }
    }


    public function getRandomStatus()
    {
        $statuses = array('draft','published');
        return $statuses[array_rand($statuses)];
    }
}
