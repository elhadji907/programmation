<?php

use Illuminate\Database\Seeder;

class FormationsCollectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FormationsCollective::class,31)->create();
    }
}
