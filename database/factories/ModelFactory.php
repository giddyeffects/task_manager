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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'department_id' => 1,
        'username' => $faker->unique()->userName,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {

    return [
//        'creator_id' => function (){
//            return factory(App\User::class)->create()->id;
//        },
        'creator_id' => 1,
        'assigned_id' => 2, //assign default normal user
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'number' => $faker->unique()->randomNumber(6),
        'due_date' => $faker->dateTimeBetween('+2 days','+4 days'),
        'category_id' => 1, //default category

    ];
});