<?php

use Illuminate\Database\Seeder;

class DafsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Daf::class,202)->create();
    }
}
