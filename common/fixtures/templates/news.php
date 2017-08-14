<?php

return [
    'id'          => $faker->randomDigitNotNull,
    'title'       => $faker->company,
    'description' => $faker->realText(),
    'text'        => $faker->realText(),
    'category_id' => $faker->numberBetween(1, 3),
    'created_at'  => $faker->unixTime,
    'updated_at'  => $faker->unixTime
];