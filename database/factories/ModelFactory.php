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
// Users
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'confirmation_token' => str_random(40),
        'avatar' => '/images/default.jpg',
        'api_token' => str_random(60)
    ];
});

// Articles
$factory->define(App\Articles::class, function (Faker\Generator $faker) {

    return [
        'user_id'     => 1,
        'title'       => $faker->unique()->text(10),
        'content'     => $faker->unique()->text(100),
        'description' => $faker->unique()->text(30),
    ];
});

// Question
$factory->define(App\Question::class, function (Faker\Generator $faker) {

    return [
        'user_id'     => 2,
        'title'       => $faker->unique()->text(10),
        'body'     => $faker->unique()->text(100),
    ];
});

// Topic
$factory->define(App\Topic::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'bio' => $faker->paragraph,
        'questions_count' => 1
    ];
});