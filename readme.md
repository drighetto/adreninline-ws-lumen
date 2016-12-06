## Adreninline Web Service Lumen with Docker and laradock

Esse é o web service do novo aplicativo da equipe Adreninline.

## Pré requisitos do ambiente

* [PHP 5.6](https://secure.php.net)
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension (--enable-mbstring)
* [NodeJS](https://nodejs.org)
* [Composer](https://getcomposer.org)
* [Bower](http://bower.io)
* [npm](https://www.npmjs.com/)
* [Docker](https://www.docker.com/)

## Docker - Laradock 

Esse projeto utiliza para ambiente de desenvolvimento o [Docker](https://www.docker.com/)

E também utiliza o projeto [Laradock](https://github.com/laradock/laradock) que já prepara todo o ambiente que precisamos para trabalhar com o Lumen

### Para usar o Docker - Laradock

Copie o diretório "laradock" para a pasta acima do projeto "adreninline-ws-lumen";

Em seguida acesse o diretório "laradock" através do terminal do docker;

E finalmente execute o comando:

```sh
  $ docker-compose up -d nginx mysql
```

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

  $ php artisan migrate

  $ php artisan db:seed

  $ php artisan migrate:refresh --seed
```

### Rodar o web service com o servidor embutido do PHP 7.0

```sh
  $ php artisan serve

  $php -S localhost:8000 -t public

  $php -S localhost:8000 -t public public/index.php
```

### Rodar o web service com o Docker + Laradock

Acesse dentro do diretório "laradock" e execute o comando abaixo:

```sh
  $ docker-compose up -d nginx mysql
```

### Abrir no browser

Com o servidor embutido do PHP:
[http://localhost:8000](http://localhost:8000)

Com o nginx do laradock:
[http://docker-machine-ip/adreninline-ws/public/](http://docker-machine-ip)

### Comandos úteis
```sh
  $ npm install -g bower

  $ npm install --global gulp-cli

  $php artisan db:seed

  $php artisan make:migration create_frequencia_table --create=frequencia

  $php artisan make:migration create_perfil_table --create=perfil

  $php artisan make:migration create_usuario_table --create=usuario
```

## Autor

[Danilo Righetto - Web Developer](https://br.linkedin.com/in/danilo-righetto)