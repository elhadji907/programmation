<?php

use Illuminate\Database\Seeder;

class InternesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Interne::class,10)->create();
    }
}
