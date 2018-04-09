<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = ['Pending','Done'];
        $limit = 2;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('task_states')->insert([ //,
                'name' => $status[$i],
            ]);
        }

        $faker = Faker\Factory::create();

        $limit = 3;

        for ($i = 0; $i < $limit; $i++) {
           DB::table('tasks')->insert([ //,
                'description' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'task_state_id' => $faker->numberBetween($min = 1, $max = 2),
                'order_id' => $faker->numberBetween($min = 1, $max = 10),
                'due_date' => $faker->dateTime($max = 'now', $timezone = null),
                'notes' => $faker->text($maxNbChars = 50),
           ]);
        }
    }
}
