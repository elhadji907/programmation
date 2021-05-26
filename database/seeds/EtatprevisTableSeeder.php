<?php

use Illuminate\Database\Seeder;

class EtatprevisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EtatsPrevi::class,9)->create();
    }
}
