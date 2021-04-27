<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
class DatabaseSeeder extends Seeder



{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,11) as $index){
            DB::table('authors')->insert([
                'name artisan s'=>$faker->name,
                
            ]);
        }
    }
}
