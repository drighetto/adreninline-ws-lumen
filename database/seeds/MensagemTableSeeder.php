<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MensagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Mensagem::class, 20)->create();
    }

    
}

?>