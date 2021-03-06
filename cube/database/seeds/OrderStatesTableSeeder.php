<?php

use Illuminate\Database\Seeder;

class OrderStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['Received','Entered','On Hold','Booked','Acknowledged','Cancelled','Closed'];
        $limit = 7;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('order_states')->insert([ //,
                'name' => $status[$i],
            ]);
        }
    }
}
