<?php

use Illuminate\Database\Seeder;
use \App\Track;

class TrackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncat eour existing records to start from scratch.
        //Shipment::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Track::create([
                'location' => $faker->sentence,
                'information' => 'Shipment is delivered',
                'shipment_id' => mt_rand(1, 10),
                'status' => 'Completed'
            ]);
        }
    }
}
