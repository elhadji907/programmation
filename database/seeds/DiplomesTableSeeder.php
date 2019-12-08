<?php

use Illuminate\Database\Seeder;

class DiplomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Diplome::class,5)->create();
     }
}