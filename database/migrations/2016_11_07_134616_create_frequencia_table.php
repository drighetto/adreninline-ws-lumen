<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrequenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pagina', 50);
            $table->timestamps();
            $table->integer('id_usuario', false, true);
            $table->foreign('id_usuario')->references('id')->on('usuario');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequencia');
    }
}
