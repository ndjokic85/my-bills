<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Front\BillCategory;
use Faker\Generator as Faker;

$factory->define(BillCategory::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'due_day' => time(),
    'valid_from' => time(),
    'valid_to' => time() + 200000,
  ];
});
