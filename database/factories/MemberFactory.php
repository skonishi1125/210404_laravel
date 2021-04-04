<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Member::class, function (Faker $faker) {
   return [
      'name' => $faker->name,
      'email' => $faker->unique()->email,
      'password' => Hash::make($faker->password),
      'picture' => $faker->unique()->userName . '.png',
   ];
});
