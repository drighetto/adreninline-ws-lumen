<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Evento::class, 20)->create();
        
    }

    
}

?>