# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Adreninline Web Service with Lumen

Esse é o web service do novo aplicativo da equipe Adreninline.

## Pré requisitos do ambiente

* [PHP 5.6](https://secure.php.net)
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension (--enable-mbstring)
* [NodeJS](https://nodejs.org)
* [Composer](https://getcomposer.org)
* [Bower](http://bower.io)
* [npm](http://gulpjs.com/)

### Instalar pacotes e dependências
```sh
  $ composer install

  $ npm install

  $ bower install

  $ gulp

```

### Configurar o ambiente

```sh
  $ cp .env.example .env

  $ php artisan migrate:refresh --seed
```

### Rodar o web service

```sh
  $ php artisan serve

  $php -S localhost:8000 -t public

  $php -S localhost:8000 -t public public/index.php
```

### Abrir no browser

[http://localhost:8000](http://localhost:8000)

### Comandos úteis
```sh
  $ npm install -g bower

  $ npm install --global gulp-cli

  $php artisan db:seed

  $php artisan make:migration create_frequencia_table --create=frequencia

  $php artisan make:migration create_perfil_table --create=perfil

  $php artisan make:migration create_usuario_table --create=usuario
```
