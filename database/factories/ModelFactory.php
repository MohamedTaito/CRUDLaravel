<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(taskk\Companies::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id' => factory('taskk\Companies')->create()->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'user_id' => function () {
             return factory(taskk\Users::class)->create()->id;
        }
    ];
});
