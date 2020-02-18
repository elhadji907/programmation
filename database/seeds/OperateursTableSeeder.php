<?php

use Illuminate\Database\Seeder;

class OperateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Operateur::class,20)->create();
    }
}
