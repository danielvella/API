<?php

use Illuminate\Database\Seeder;

use App\Vehicle;

use Faker\Factory as Faker;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

    	for ($i = 0; $i < 30; $i++) {
	        Vehicle::create([
	        	'color' 	=> $faker->safeColorName(),
	        	'power' 	=> $faker->randomNumber(),
	        	'speed' 	=> $faker->randomFloat(),
	        	'capacity' 	=> $faker->randomFloat(),
	        	'maker_id'	=> $faker->numberBetween(1, 5)
	        ]);
	    }
    }
}
