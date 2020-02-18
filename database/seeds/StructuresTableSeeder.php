<?php

use Illuminate\Database\Seeder;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $structure1  = App\Structure::firstOrCreate(["name"=>"Publique"],["uuid"=>Str::uuid()]);
        $structure2  = App\Structure::firstOrCreate(["name"=>"Privée"],["uuid"=>Str::uuid()]);
    }
}
