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
       
        $lieux1  = App\Lieux::firstOrCreate(["name"=>"Dakar"],["uuid"=>Str::uuid()]);
        $lieux2  = App\Lieux::firstOrCreate(["name"=>"Kaolack"],["uuid"=>Str::uuid()]);
        $lieux3  = App\Lieux::firstOrCreate(["name"=>"Saint-Louis"],["uuid"=>Str::uuid()]);
        $lieux4  = App\Lieux::firstOrCreate(["name"=>"Ziguinchor"],["uuid"=>Str::uuid()]);
        $lieux5  = App\Lieux::firstOrCreate(["name"=>"Diourbel"],["uuid"=>Str::uuid()]);
        $lieux6  = App\Lieux::firstOrCreate(["name"=>"PDCEJ"],["uuid"=>Str::uuid()]);

    }
}
