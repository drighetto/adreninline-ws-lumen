<?php


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'sexo' => $faker->randomElement(['F', 'M']),
        'telefone' => $faker->randomNumber,
        'bairro' => $faker->randomElement(['tucuruvi', 'santana', 'carandiru']),
        'cidade' => $faker->randomElement(['sao paulo', 'osasco', 'guarulhos']),
        'estado' => $faker->randomElement(['sao paulo', 'campinas', 'limeira']),
        'cep' => $faker->randomNumber,
        'email' => $faker->email,
        'senha' => $faker->word,
        'pergunta1' => $faker->sentence(10),
        'pergunta2' => $faker->sentence(10),
        'pergunta3' => $faker->sentence(10),
        'pergunta4' => $faker->sentence(10),
    ];
});

$factory->define(App\Frequencia::class, function (Faker\Generator $faker) {
    return [
        'pagina' => $faker->randomElement(['equipe', 'aulas', 'mapas-culturais']),
        'id_usuario' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Perfil::class, function (Faker\Generator $faker) {
    return [
        'perfil' => $faker->randomElement(['user', 'admin']),
        'id_usuario' => $faker->randomDigitNotNull,
    ];
});
