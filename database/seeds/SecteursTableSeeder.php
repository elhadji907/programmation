<?php

use Illuminate\Database\Seeder;

class SecteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secteur1 =  App\Secteur::firstOrCreate(["name"=>"primaire"],["uuid"=>Str::uuid()]);
        $secteur2 =  App\Secteur::firstOrCreate(["name"=>"secondaire"],["uuid"=>Str::uuid()]);
        $secteur3 =  App\Secteur::firstOrCreate(["name"=>"tertiaire"],["uuid"=>Str::uuid()]);
        $secteur4 =  App\Secteur::firstOrCreate(["name"=>"quaternaire"],["uuid"=>Str::uuid()]);
    }
}
