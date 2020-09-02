<?php

use Illuminate\Database\Seeder;

class LocalitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localite1  = App\Localite::firstOrCreate(["name"=>"Dakar"],["uuid"=>Str::uuid()]);
        $localite2  = App\Localite::firstOrCreate(["name"=>"Kaolack"],["uuid"=>Str::uuid()]);
        $localite3  = App\Localite::firstOrCreate(["name"=>"Saint-Louis"],["uuid"=>Str::uuid()]);
        $localite4  = App\Localite::firstOrCreate(["name"=>"Ziguinchor"],["uuid"=>Str::uuid()]);
        $localite5  = App\Localite::firstOrCreate(["name"=>"Diourbel"],["uuid"=>Str::uuid()]);
        $localite6  = App\Localite::firstOrCreate(["name"=>"PDCEJ"],["uuid"=>Str::uuid()]);
    }
}
