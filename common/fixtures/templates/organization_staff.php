<?php

return [
    'id'         => $faker->numberBetween(1, 2),
    'parent_id'  => null,
    'name'       => $faker->name,
    'email'      => $faker->email,
    'gender'     => $faker->randomElement(['M','F']),
    'created_at' => $faker->unixTime,
    'updated_at' => $faker->unixTime
];
