<?php

use Illuminate\Database\Seeder;

class BordereausTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bordereau::class,13)->create();
    }
}
