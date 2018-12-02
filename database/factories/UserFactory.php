<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(taskk\Users::class, function (Faker $faker) {
    return [
      'name' => str_random(10),
      'email' => str_random(10).'@gmail.com',
      'password' => bcrypt('secret'), // secret
      'remember_token' => str_random(10),
      'created_at' =>timestamp(),
      'updated_at'=>timestamp(),
    ];
});
