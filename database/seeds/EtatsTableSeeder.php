<?php

use Illuminate\Database\Seeder;

class EtatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Etat::class,12)->create();
    }
}
