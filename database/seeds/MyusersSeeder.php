<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MyusersSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker\Factory::create();

    \App\Myuser::truncate();

    for ($i = 0; $i < 10; $i++)
    {
      \App\Myuser::create([
        'nick' => $faker->word(7),
        'login' => $faker->word(10),
        'email' => $faker->email(),
      ]);
    }
  }

}
