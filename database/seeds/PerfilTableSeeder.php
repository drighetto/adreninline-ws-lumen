<?php

use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Perfil::class, 30)->create();
        //factory(\App\Entities\Perfil::class, 30)->create();
    }
}

?>