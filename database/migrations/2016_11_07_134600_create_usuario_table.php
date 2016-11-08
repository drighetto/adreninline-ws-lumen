<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->enum('sexo',['F','M']);
            $table->integer('telefone');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('cep');
            $table->string('email');
            $table->string('senha');
            $table->string('pergunta1');
            $table->string('pergunta2');
            $table->string('pergunta3');
            $table->string('pergunta4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
