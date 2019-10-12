<?php

use Illuminate\Database\Seeder;

class RecuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recue::class,25)->create();
    }
}
