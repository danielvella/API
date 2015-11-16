<?php

use Illuminate\Database\Seeder;

use App\Maker;

use Faker\Factory as Faker;

class MakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

    	for ($i = 0; $i < 5; $i++) {
	        Maker::create([
	        	'name'  => $faker->word(),
	        	'phone' => $faker->randomDigit(8)
	        ]);
	    }
    }
}
