<?php

use Illuminate\Database\Seeder;

class FonctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $fonction1=App\Fonction::firstOrCreate(
            ["name"=>"Président du Conseil d'Administration"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"PCA"]);
        $fonction2=App\Fonction::firstOrCreate(
            ["name"=>"Chef du centre de ressources Documentation et information"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"Chef CRDI"]);
        $fonction3=App\Fonction::firstOrCreate(
            ["name"=>"Chef du Service Informatique"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"Chef SI"]);
        $fonction4=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de l'Ingénieur et des opérations de formation"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"DIOF"]);
        $fonction5=App\Fonction::firstOrCreate(
            ["name"=>"Chauffeur"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"Chauffeur"]);
        $fonction6=App\Fonction::firstOrCreate(
            ["name"=>"Directeur Général"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"DG"]);
        $fonction=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de la planification et des projets"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"DPP"]);
    }
}
