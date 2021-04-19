<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,11) as $index){
            DB::table('books')->insert([
                'title'=>$faker->name,
                'description'=>$faker->text(300)
            ]);
        }
    }
}
