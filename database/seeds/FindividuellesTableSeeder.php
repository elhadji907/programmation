<?php

use Illuminate\Database\Seeder;

class FindividuellesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fcollective::class,31)->create();
    }
}
