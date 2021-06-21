<?php

use Illuminate\Database\Seeder;

class LieuxsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Lieux::class,25)->create();

    }
}
