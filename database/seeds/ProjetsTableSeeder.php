<?php

use Illuminate\Database\Seeder;

class ProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $Projet1  = App\Projet::firstOrCreate(["name"=>"Projet d'employabilite des jeunes par l'apprentissage"],["sigle"=>"PEJA"],["uuid"=>Str::uuid()]);
        $Projet2  = App\Projet::firstOrCreate(["name"=>"Projet d’appui au Développement des Compétences et de l’Entreprenariat des Jeunes dans les secteurs porteurs"],["sigle"=>"PDCEJ"],["uuid"=>Str::uuid()]);
        $Projet3  = App\Projet::firstOrCreate(["name"=>"Projet ACEFOP"],["sigle"=>"ACEFP"],["uuid"=>Str::uuid()]);
        
    }
}
