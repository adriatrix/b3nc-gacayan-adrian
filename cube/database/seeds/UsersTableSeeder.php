<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

        $limit = 9;

        for ($i = 0; $i < $limit; $i++) {
           DB::table('users')->insert([ //,
                'email' => $faker->email,
                'password' => $faker->password,
                'name' => $faker->name,
                'nickname' => $faker->userName,
                'team' => $faker->word,
           ]);
        }
    }
}
