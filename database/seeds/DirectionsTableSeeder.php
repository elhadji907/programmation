<?php

use Illuminate\Database\Seeder;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $direction1=App\Direction::firstOrCreate(["name"=>"Direction de l'Ingénierie et de la Formation (DIOF)"],["chef_id"=> "1" ],["uuid"=>Str::uuid()]);
            $direction2=App\Direction::firstOrCreate(["name"=>"Direction de l'Evaluation et de la Certification (DEC)"],["chef_id"=> "2" ],["uuid"=>Str::uuid()]);
            $direction3=App\Direction::firstOrCreate(["name"=>"Direction de la planification des projets (DPP)"],["chef_id"=> "3" ],["uuid"=>Str::uuid()]);
            $direction4=App\Direction::firstOrCreate(["name"=>"Cellule de comminucation"],["chef_id"=> "4"],["uuid"=>Str::uuid()]);
            $direction5=App\Direction::firstOrCreate(["name"=>"Service construction "],["chef_id"=> "5"],["uuid"=>Str::uuid()]);
            $direction6=App\Direction::firstOrCreate(["name"=>"Service Informatique (SI)"],["chef_id"=> "6"],["uuid"=>Str::uuid()]);
            $direction7=App\Direction::firstOrCreate(["name"=>"Direction administrative et financier (DAF)"],["chef_id"=> "7"],["uuid"=>Str::uuid()]);
            $direction8=App\Direction::firstOrCreate(["name"=>"Service d'Edition de manuel"],["chef_id"=> "8"],["uuid"=>Str::uuid()]);
           /*  $direction9=App\Direction::firstOrCreate(["name"=>"Aucune"],["chef_id"=> "9"],["uuid"=>Str::uuid()]); */
                
    }
}
