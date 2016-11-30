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

$factory->define(App\Evento::class, function (Faker\Generator $faker) {
    return [
        'resumo' => $faker->randomElement(['Evento - Street', 'Evento - Jump', 'Evento - Slalom', 'Evento - Slide']),
        'descricao' => $faker->sentence(10),
        'link' => $faker->randomElement([
            'http://www.adreninline.com/single-post/2016/11/26/Como-escolher-um-capacete-para-patina%C3%A7%C3%A3o', 
            'http://www.adreninline.com/single-post/2016/09/28/Como-comprar-um-patins-de-segunda-m%C3%A3o', 
            'http://www.adreninline.com/single-post/2016/09/08/Como-diminuir-o-tempo-em-uma-volta-no-parque', 
            'http://www.adreninline.com/single-post/2016/09/01/Boa-forma-f%C3%ADsica-e-patins'
            ]),
        'data' => $faker->randomElement(['2017-01-10', '2017-02-10', '2017-03-20', '2017-05-10']),
    ];
});

$factory->define(App\Mensagem::class, function (Faker\Generator $faker) {
    return [
        'resumo' => $faker->randomElement(['Mensagem - Street', 'Mensagem - Jump', 'Mensagem - Slalom', 'Mensagem - Slide']),
        'descricao' => $faker->sentence(10),
    ];
});
