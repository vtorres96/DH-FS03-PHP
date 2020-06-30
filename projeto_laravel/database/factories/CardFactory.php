<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        // indicando que teremos uma sentenca com 6 palavras para coluna title
       'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        // indicando que teremos uma sentenca com 2 paragrafos para coluna content
       'content' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true)
    ];
});
