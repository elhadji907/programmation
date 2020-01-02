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
        $fonction7=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de la planification et des projets"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"DPP"]);
        $fonction8=App\Fonction::firstOrCreate(
            ["name"=>"Directeur administratif et financier"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"DAF"]);
        $fonction9=App\Fonction::firstOrCreate(
            ["name"=>"Agent DAF"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"A-DAF"]);
        $fonction10=App\Fonction::firstOrCreate(
            ["name"=>"Agent DIOF"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"A-DIOF"]);
        $fonction11=App\Fonction::firstOrCreate(
            ["name"=>"Agent DEC"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"A-DEC"]);
        $fonction12=App\Fonction::firstOrCreate(
            ["name"=>"Prestatire"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"P-DG"]);
        $fonction13=App\Fonction::firstOrCreate(
            ["name"=>"Stagiaire"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"S-DG"]);
    }
}
