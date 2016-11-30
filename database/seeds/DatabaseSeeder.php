<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        //Model::unguard();

        $this->call('UsuarioTableSeeder');
        $this->call('FrequenciaTableSeeder');
        $this->call('PerfilTableSeeder');
        $this->call('EventoTableSeeder');
        $this->call('MensagemTableSeeder');

        //Model::reguard();

/*
         factory(\App\Entities\Usuario::class, 50)->create()->each(function ($usuario) {
            foreach (range(1,20) as $v) {
                $usuario->frequencia()->save(factory(\App\Entities\Frequencia::class)->make());
                $usuario->perfil()->save(factory(\App\Entities\Perfil::class)->make());
            }
        });
        */
        
    }
}
