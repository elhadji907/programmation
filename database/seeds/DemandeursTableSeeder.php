<?php

use Illuminate\Database\Seeder;

class DemandeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Demandeur::class,70)->create();
        
    }
}
