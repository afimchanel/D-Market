<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Dogs;
use Faker\Generator as Faker;

$factory->define(Dogs::class, function (Faker $faker) {
    return [
        
        'NAMEDOG' => $faker->words(),
        'BREED' => $faker->words(),
        'COLOR' => $faker->words(),
        'SIRE' => $faker->words(),
        'DAM' => $faker->words(),
        'BREEDER' => $faker->words(),
        'OWNER' => $faker->words(),
        'REG_NO' => $faker->words(),
        'MICROCHIP' => $faker->words(),
        'SEX' => $faker->words(),
        'DATE_OF_BIRTH ' => $faker->words(),
        'DATE_ISSUED' => $faker->words(),

    ];
});
