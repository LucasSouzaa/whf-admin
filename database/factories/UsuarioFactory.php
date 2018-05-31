<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    // $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'nascimento' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'cpf' => $faker->cpf(false),
        'senha' => $faker->password(),
        'foto' => $faker->imageUrl(500, 500),
        'status' => 'a'
    ];
});
