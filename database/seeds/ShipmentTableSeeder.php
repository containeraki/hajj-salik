<?php

use Illuminate\Database\Seeder;
use App\Shipment;

class ShipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        //Shipment::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Shipment::create([
                'title' => $faker->sentence,
                'shipment_to' => $faker->address,
                'shipment_from' => $faker->address,
                'partner' => $faker->text,
                'type' => 'Completed',
                'user_id' => mt_rand(1, 10)
            ]);
        }
    }
}
