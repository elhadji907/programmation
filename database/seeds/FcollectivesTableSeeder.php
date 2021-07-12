<?php

use Illuminate\Database\Seeder;

class FcollectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Findividuelle::class,31)->create();
    }
}
