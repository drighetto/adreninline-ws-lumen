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
        'telefone' => $faker->randomElement(['11 3105-1553', '11 3104-5300', '11 3329-9852']),
        'bairro' => $faker->randomElement(['tucuruvi', 'santana', 'carandiru']),
        'cidade' => $faker->randomElement(['sao paulo', 'osasco', 'guarulhos']),
        'estado' => $faker->randomElement(['sao paulo', 'campinas', 'limeira']),
        'cep' => $faker->randomElement(['01014-001', '02034-101', '01014-222']),
        'email' => $faker->email,
        'senha' => $faker->randomElement(['1234', 'teste', 'equipe']),
        'pergunta1' => $faker->randomElement(['S', 'N']),
        'pergunta2' => $faker->randomElement(['S', 'N']),
        'pergunta3' => $faker->randomElement(['street', 'slalom', 'speed', 'jump', 'slide']),
        'pergunta4' => $faker->randomElement(['amigos', 'familia', 'social', 'site', 'outros']),
    ];
});

$factory->define(App\Frequencia::class, function (Faker\Generator $faker) {
    return [
        'pagina' => $faker->randomElement(['home','equipe', 'aulas', 'mapas-culturais' , 'galeria', 'videos', 'contato']),
        'id_usuario' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Perfil::class, function (Faker\Generator $faker) {
    return [
        'perfil' => $faker->randomElement(['user', 'admin']),
        'id_usuario' => $faker->randomDigitNotNull,
    ];
});
