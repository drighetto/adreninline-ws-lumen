<?php

use Illuminate\Database\Seeder;

class FrequenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Frequencia::class, 30)->create();
        //factory(\App\Entities\Frequencia::class, 30)->create();
    }
}

?>