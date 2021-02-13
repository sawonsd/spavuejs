<?php

use Illuminate\Database\Seeder;
use App\Category;
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
            $category = $faker->unique()->name;

        	Category::create([
        		'name' => $category,
        		'slug' => slugify($category),
        		'status' => $this->getRandomStatus(),
        	]);
        }
    }



    public function getRandomStatus()
        {
            $status = array(0,1);
            return $status[array_rand($status)];
        }
}
