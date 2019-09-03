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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Models\Restaurant::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 3),
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Table::class, function (Faker\Generator $faker) {
    return [
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 3),
        'code' => $faker->randomLetter,
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 3),
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'description' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50),
        'picture' => $faker->imageUrl(500, 500, 'cats'),
    ];
});
