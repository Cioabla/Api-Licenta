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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//    ];
//});
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {

    return [
        'category_id' =>$faker->numberBetween(1,7),
        'name' => $faker->name,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'subcategory_id' =>$faker->numberBetween(1,20),
        'name' => $faker->name,
        'model' => $faker->name,
        'price' => $faker->numberBetween(200,600),
        'qty' => $faker->numberBetween(1,15),
        'description' => $faker->text(100),
        'brand' => $faker->name,
        'dimension' => $faker->numberBetween(5,100),
        'review' => $faker->text(100),
        'released' => $faker->time(),
        'location' => $faker->numberBetween(0,0),
        'img' => $faker->name,
        'img2' => $faker->name,
        'img3' => $faker->name,
        'new' => $faker->numberBetween(0,0)
    ];
});