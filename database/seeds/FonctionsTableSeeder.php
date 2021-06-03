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
            ["sigle"=>"PCA"],
            ["uuid"=>Str::uuid()]);
        $fonction2=App\Fonction::firstOrCreate(
            ["name"=>"Chef du centre de ressources Documentation et information"],
            ["sigle"=>"Chef CRDI"],
            ["uuid"=>Str::uuid()]);
        $fonction3=App\Fonction::firstOrCreate(
            ["name"=>"Chef du Service Informatique"],
            ["sigle"=>"Chef SI"],
            ["uuid"=>Str::uuid()]);
        $fonction4=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de l'Ingénieur et des opérations de formation"],
            ["sigle"=>"DIOF"],
            ["uuid"=>Str::uuid()]);
        $fonction5=App\Fonction::firstOrCreate(
            ["name"=>"Chauffeur"],
            ["sigle"=>"Chauffeur"],
            ["uuid"=>Str::uuid()]);
        $fonction6=App\Fonction::firstOrCreate(
            ["name"=>"Directeur Général"],
            ["sigle"=>"DG"],
            ["uuid"=>Str::uuid()]);
        $fonction7=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de la planification et des projets"],
            ["sigle"=>"DPP"],
            ["uuid"=>Str::uuid()]);
        $fonction8=App\Fonction::firstOrCreate(
            ["name"=>"Directeur administratif et financier"],
            ["sigle"=>"DAF"],
            ["uuid"=>Str::uuid()]);
        $fonction9=App\Fonction::firstOrCreate(
            ["name"=>"Agent DAF"],
            ["sigle"=>"A-DAF"],
            ["uuid"=>Str::uuid()]);
        $fonction10=App\Fonction::firstOrCreate(
            ["name"=>"Agent DIOF"],
            ["sigle"=>"A-DIOF"],
            ["uuid"=>Str::uuid()]);
        $fonction11=App\Fonction::firstOrCreate(
            ["name"=>"Agent DEC"],
            ["uuid"=>Str::uuid()],
            ["sigle"=>"A-DEC"]);
        $fonction12=App\Fonction::firstOrCreate(
            ["name"=>"Prestatire"],
            ["sigle"=>"P-DG"],
            ["uuid"=>Str::uuid()]);
        $fonction13=App\Fonction::firstOrCreate(
            ["name"=>"Stagiaire"],
            ["sigle"=>"S-DG"],
            ["uuid"=>Str::uuid()]);
    }
}
