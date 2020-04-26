<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use App\Purchase;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    $createdAt =  (\Carbon\Carbon::now()->subSeconds(1000));
    $updatedAt = (\Carbon\Carbon::now()->subSeconds(1000));
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        "created_at" => $createdAt,
        "updated_at" => $updatedAt
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    $createdAt =  (\Carbon\Carbon::now()->subSeconds(1000));
    $updatedAt = (\Carbon\Carbon::now()->subSeconds(1000));
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(1.0, 10.0),
        'image_url' => $faker->url,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
         },
        "created_at" => $createdAt,
        "updated_at" => $updatedAt
    ];
});


$factory->define(Purchase::class, function (Faker $faker) {
    $createdAt =  (\Carbon\Carbon::now()->subSeconds(1000));
    $updatedAt = (\Carbon\Carbon::now()->subSeconds(1000));
    return [
        'client_address' => $faker->sentence,
        'client_name' =>  $faker->name,
        'client_lastname' => $faker->lastName,
        'client_phone' =>  $faker->phoneNumber,
        'delivery_price' => 1.00,
        "created_at" => $createdAt,
        "updated_at" => $updatedAt
    ];
});
