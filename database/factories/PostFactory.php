<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'nom'=>$faker->sentence(3),
        'context'=>$faker->paragraph,
        'image'=>rand(1,15).".jpg"
    ];
});
