<?php

use Illuminate\Database\Seeder;

class ListesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Liste::class,31)->create();
    }
}
