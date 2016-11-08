<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Usuario::class, 30)->create();
        //factory(\App\Entities\Usuario::class, 30)->create();
    }

    
}

?>