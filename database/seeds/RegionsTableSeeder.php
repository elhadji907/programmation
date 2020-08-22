<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region1  = App\Region::firstOrCreate(["nom"=>"Tambacounda"],["uuid"=>Str::uuid()]);
        $region2  = App\Region::firstOrCreate(["nom"=>"Ziguinchor"],["uuid"=>Str::uuid()]);
        $region3  = App\Region::firstOrCreate(["nom"=>"Diourbel"],["uuid"=>Str::uuid()]);
        $region4  = App\Region::firstOrCreate(["nom"=>"Saint-Louis"],["uuid"=>Str::uuid()]);
        $region5  = App\Region::firstOrCreate(["nom"=>"Dakar"],["uuid"=>Str::uuid()]);
        $region6  = App\Region::firstOrCreate(["nom"=>"Kaolack"],["uuid"=>Str::uuid()]);
        $region7  = App\Region::firstOrCreate(["nom"=>"Thiès"],["uuid"=>Str::uuid()]);
        $region8  = App\Region::firstOrCreate(["nom"=>"Louga"],["uuid"=>Str::uuid()]);
        $region9  = App\Region::firstOrCreate(["nom"=>"Fatick"],["uuid"=>Str::uuid()]);
        $region10 = App\Region::firstOrCreate(["nom"=>"Kolda"],["uuid"=>Str::uuid()]);
        $region11 = App\Region::firstOrCreate(["nom"=>"Matam"],["uuid"=>Str::uuid()]);
        $region12 = App\Region::firstOrCreate(["nom"=>"Kaffrine"],["uuid"=>Str::uuid()]);
        $region13 = App\Region::firstOrCreate(["nom"=>"Kedougou"],["uuid"=>Str::uuid()]);
        $region14 = App\Region::firstOrCreate(["nom"=>"Sédhiou"],["uuid"=>Str::uuid()]);
    }
}
