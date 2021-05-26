<?php

use Illuminate\Database\Seeder;

class TresorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tresor::class,23)->create();
    }
}
