<?php

return [
    'id'         => $faker->numberBetween(1, 3),
    'name'       => $faker->countryCode,
    'created_at' => $faker->unixTime,
    'updated_at' => $faker->unixTime
];
