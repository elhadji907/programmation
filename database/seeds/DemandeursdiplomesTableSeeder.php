<?php

use Illuminate\Database\Seeder;

class DemandeursdiplomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Demandeursdiplome::class,2)->create();
    }
}
