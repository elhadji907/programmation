<?php

use Illuminate\Database\Seeder;

class CollectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Collective::class,81)->create();
    }
}
