<?php

use Illuminate\Database\Seeder;

class IndividuellesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Individuelle::class,72)->create();
    }
}
