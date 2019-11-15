<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\BillCategory;
use Faker\Generator as Faker;

$factory->define(BillCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'due_day' => now(),
    ];
});
