<?php

use Illuminate\Database\Seeder;

class FadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fad::class,25)->create();
    }
}
