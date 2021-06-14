<?php

use Illuminate\Database\Seeder;

class ActivitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activite1=App\Activite::firstOrCreate(["name"=>"Formation des MA"],["uuid"=>Str::uuid()]);
    }
}
