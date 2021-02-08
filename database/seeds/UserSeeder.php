<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->defaultUser();

        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index){

            User::create([
                'name' => $faker->name,
                'email' =>$faker->unique()->email,
                'password' => bcrypt($faker->password),
            ]);
        }
 
    }



    public function defaultUser()
    {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' =>'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
    }




}
