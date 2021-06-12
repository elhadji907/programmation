<?php

use Illuminate\Database\Seeder;

class FacturesdafsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Facturesdaf::class,77)->create();
    }
}
