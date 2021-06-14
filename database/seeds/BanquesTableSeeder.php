<?php

use Illuminate\Database\Seeder;

class BanquesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Banque::class,38)->create();
    }
}
