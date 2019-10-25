<?php

use Illuminate\Database\Seeder;

class CourriersHasDirectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CourriersHasDirection::class,5)->create();
    }
}
