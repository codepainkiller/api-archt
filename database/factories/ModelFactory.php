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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Place::class, function (Faker\Generator $faker) {
    return [
        'lat' => strval($faker->latitude),
        'lng' => strval($faker->longitude),
        'elevation' => $faker->numerify('###'),
        'name' => $faker->sentence,
        'description' =>$faker->paragraph,
        'webpage' => $faker->domainName,
        'category_id' => rand(1, 7)
    ];
});

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence()
    ];
});

$factory->define(App\Models\Answer::class, function (Faker\Generator $faker) {
    return [
        'answer' => $faker->randomElement(['si', 'no']),
        'user_id' => rand(1, 10),
        'question_id' => rand(1, 5)
    ];
});

$factory->define(App\Models\Visit::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 10),
        'place_id' => rand(1, 70)
    ];
});
$factory->define(App\Models\Photo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lexify('photo_??????????.jpg'),
        'place_id' => rand(1, 70)
    ];
});
$factory->define(App\Models\Audio::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lexify('audio_??????????.jpg'),
        'place_id' => rand(1, 70)
    ];
});
