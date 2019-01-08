<?php

use Faker\Generator as Faker;
use App\Models\Professional as Professional;

$factory->define(Professional::class, function (Faker $faker) {
    return [
        'first_name' => $faker-> name,
        'middle_name' => $faker-> name,
        'last_name' => $faker-> name,
        'degree' => $faker-> randomDigit,
        'email' => $faker-> email,
        'password' => bcrypt(123456789),
        'country' => 'egypt',
        'phone' => $faker-> phoneNumber,
        'api_token' => str_random(60),
    ];
});
