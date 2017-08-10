<?php

return [
    'id'          => $faker->numberBetween(1, 3),
    'parent_id'   => null,
    'title'       => $faker->company,
    'description' => $faker->realText(),
    'created_at'  => $faker->unixTime,
    'updated_at'  => $faker->unixTime
];