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
            ["name"=>"Chef du Centre de Ressources Documentation et Information"],
            ["sigle"=>"CRDI"],
            ["uuid"=>Str::uuid()]);
$fonction2=App\Fonction::firstOrCreate(
            ["name"=>"Gestionnaire du matériel roulant"],
            ["sigle"=>"GMR"],
            ["uuid"=>Str::uuid()]);
$fonction3=App\Fonction::firstOrCreate(
            ["name"=>"Agent Comptable"],
            ["sigle"=>"AC"],
            ["uuid"=>Str::uuid()]);
$fonction4=App\Fonction::firstOrCreate(
            ["name"=>"Directeur Administratif et financier"],
            ["sigle"=>"DAF"],
            ["uuid"=>Str::uuid()]);
$fonction5=App\Fonction::firstOrCreate(
            ["name"=>"Président du conseil d'administration"],
            ["sigle"=>"PCA"],
            ["uuid"=>Str::uuid()]);
$fonction6=App\Fonction::firstOrCreate(
            ["name"=>"Coordonatrice des antenne régionales"],
            ["sigle"=>"CAR"],
            ["uuid"=>Str::uuid()]);
$fonction7=App\Fonction::firstOrCreate(
            ["name"=>"Directrice des Evaluations et Certification"],
            ["sigle"=>"DEC"],
            ["uuid"=>Str::uuid()]);
$fonction8=App\Fonction::firstOrCreate(
            ["name"=>"Chef d'antenne Saint-Louis"],
            ["sigle"=>"CA/SL"],
            ["uuid"=>Str::uuid()]);
$fonction9=App\Fonction::firstOrCreate(
            ["name"=>"Chef d'antenne Kédougou"],
            ["sigle"=>"CA/KG"],
            ["uuid"=>Str::uuid()]);
$fonction10=App\Fonction::firstOrCreate(
            ["name"=>"Chef de division ressources humaines "],
            ["sigle"=>"RH"],
            ["uuid"=>Str::uuid()]);
$fonction11=App\Fonction::firstOrCreate(
            ["name"=>"Conseillére en édition"],
            ["sigle"=>"CE"],
            ["uuid"=>Str::uuid()]);
$fonction12=App\Fonction::firstOrCreate(
            ["name"=>"Chef de cellule passation des marchés"],
            ["sigle"=>"CPM"],
            ["uuid"=>Str::uuid()]);
$fonction13=App\Fonction::firstOrCreate(
            ["name"=>"Controleur de gestion"],
            ["sigle"=>"CG"],
            ["uuid"=>Str::uuid()]);
$fonction14=App\Fonction::firstOrCreate(
            ["name"=>"Chef de l'unité recherche et développement"],
            ["sigle"=>"Chef URD"],
            ["uuid"=>Str::uuid()]);
$fonction15=App\Fonction::firstOrCreate(
            ["name"=>"Conseiller en insertion professionnelle "],
            ["sigle"=>"CIP"],
            ["uuid"=>Str::uuid()]);
$fonction16=App\Fonction::firstOrCreate(
            ["name"=>"Directrice de l'ingénierie et des opérations de formation"],
            ["sigle"=>"DIOF"],
            ["uuid"=>Str::uuid()]);
$fonction17=App\Fonction::firstOrCreate(
            ["name"=>"Directeur général"],
            ["sigle"=>"DG"],
            ["uuid"=>Str::uuid()]);
$fonction18=App\Fonction::firstOrCreate(
            ["name"=>"Chef bureau courrier"],
            ["sigle"=>"CBC"],
            ["uuid"=>Str::uuid()]);
$fonction19=App\Fonction::firstOrCreate(
            ["name"=>"Chef de la Cellule de communication"],
            ["sigle"=>"Journaliste"],
            ["uuid"=>Str::uuid()]);
$fonction20=App\Fonction::firstOrCreate(
            ["name"=>"Chef antenne Kolda"],
            ["sigle"=>"CA/KD"],
            ["uuid"=>Str::uuid()]);
$fonction21=App\Fonction::firstOrCreate(
            ["name"=>"Auditrice interne"],
            ["sigle"=>"AI"],
            ["uuid"=>Str::uuid()]);
$fonction22=App\Fonction::firstOrCreate(
            ["name"=>"Chef du Service Accueil, orientation et Sécurité"],
            ["sigle"=>"SAOS"],
            ["uuid"=>Str::uuid()]);
$fonction23=App\Fonction::firstOrCreate(
            ["name"=>"Directeur de la planification et des projets"],
            ["sigle"=>"DPP"],
            ["uuid"=>Str::uuid()]);
$fonction24=App\Fonction::firstOrCreate(
            ["name"=>"Chef antenne Kaolack"],
            ["sigle"=>"CA/KL"],
            ["uuid"=>Str::uuid()]);
$fonction25=App\Fonction::firstOrCreate(
            ["name"=>"Chef antenne Diourbel"],
            ["sigle"=>"CA/DL"],
            ["uuid"=>Str::uuid()]);
$fonction26=App\Fonction::firstOrCreate(
            ["name"=>"Informaticien"],
            ["sigle"=>"Informaticien"],
            ["uuid"=>Str::uuid()]);
$fonction27=App\Fonction::firstOrCreate(
            ["name"=>"Chef de la Cellule de communication"],
            ["sigle"=>"COM"],
            ["uuid"=>Str::uuid()]);
$fonction28=App\Fonction::firstOrCreate(
            ["name"=>"Ingénieur de la formation"],
            ["sigle"=>"IF"],
            ["uuid"=>Str::uuid()]);
$fonction29=App\Fonction::firstOrCreate(
            ["name"=>"Assistante administrative"],
            ["sigle"=>"AA"],
            ["uuid"=>Str::uuid()]);
$fonction30=App\Fonction::firstOrCreate(
            ["name"=>"Chargée de communication"],
            ["sigle"=>"CC"],
            ["uuid"=>Str::uuid()]);
$fonction31=App\Fonction::firstOrCreate(
            ["name"=>"Assistante conseillère en formation"],
            ["sigle"=>"ACF"],
            ["uuid"=>Str::uuid()]);
$fonction32=App\Fonction::firstOrCreate(
            ["name"=>"Chef de bureau à l'agence comptable"],
            ["sigle"=>"CB - AC"],
            ["uuid"=>Str::uuid()]);
$fonction33=App\Fonction::firstOrCreate(
            ["name"=>"Chef de la division planification"],
            ["sigle"=>"CDP - DPP"],
            ["uuid"=>Str::uuid()]);
$fonction34=App\Fonction::firstOrCreate(
            ["name"=>"Assistante de direction"],
            ["sigle"=>"AD"],
            ["uuid"=>Str::uuid()]);
$fonction35=App\Fonction::firstOrCreate(
            ["name"=>"Chef de la Division logistique"],
            ["sigle"=>"CDL - DAF"],
            ["uuid"=>Str::uuid()]);
$fonction36=App\Fonction::firstOrCreate(
            ["name"=>"Chauffeur"],
            ["sigle"=>"Chauffeur"],
            ["uuid"=>Str::uuid()]);
$fonction37=App\Fonction::firstOrCreate(
            ["name"=>"Chef du service informatique"],
            ["sigle"=>"Chef SI"],
            ["uuid"=>Str::uuid()]);
        }
    }
    