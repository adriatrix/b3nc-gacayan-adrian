<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('orders')->insert([ //,
                'so_num' => $faker->numberBetween($min = 700000, $max = 800000),
                'po_num' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'notes' => $faker->text($maxNbChars = 50),
                'customer_id' => $faker->numberBetween($min = 1, $max = 10),
                'received_date' => $faker->dateTime($max = 'now', $timezone = null),
                'user_id' => $faker->numberBetween($min = 1, $max = 1),
                'order_state_id' => $faker->numberBetween($min = 1, $max = 7),
            ]);
        }
    }
}
