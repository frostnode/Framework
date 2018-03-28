<?php

use Faker\Generator as Faker;
use Modules\Page\Entities\Page;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'title' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'slug' => $faker->unique()->slug,
        'content' => ['body' => $faker->realText($maxNbChars = 2000, $indexSize = 5)],
        'status' => $faker->randomElement($array = array ('1','2')),
        'pagetype_model' => $faker->randomElement($array = array ('App\Pages\BlogPage','App\Pages\Page')),
        'user_id' => 1,
        'lang_id' => 1,
        'deleted_at' => $faker->randomElement($array = array (null, null, null, $faker->dateTimeThisMonth($max = 'now', $timezone = null))),
    ];
});
