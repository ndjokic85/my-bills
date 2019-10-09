<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Front\BillCategory;
use Faker\Generator as Faker;

$factory->define(BillCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'due_day' => $faker->time,
        'valid_from' => $faker->time,
        'valid_to' => $faker->time + 2000,
    ];
});
