<?php

use Illuminate\Database\Seeder;

class DepensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Depense::class,5)->create();
    }
}
