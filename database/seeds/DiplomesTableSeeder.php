<?php

use Illuminate\Database\Seeder;

class DiplomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Certificat de fin d'étude élémentaire"],["sigle"=> "CFEE" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Brevet de fin d'étude moyen"],["sigle"=> "BFEM" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Baccalauréat"],["sigle"=> "BAC" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Licence 1"],["sigle"=> "L1" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Licence 2"],["sigle"=> "L2" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Licence 3"],["sigle"=> "L3" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Master 1"],["sigle"=> "M1" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Master 2"],["sigle"=> "M2" ],["uuid"=>Str::uuid()]);
        $diplomes=App\Diplome::firstOrCreate(["name"=>"Autre"],["sigle"=> "autre" ],["uuid"=>Str::uuid()]);
     }
}