<?php

use Illuminate\Database\Seeder;

class PersonnelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Personnel::class,125)->create();
    }
}
