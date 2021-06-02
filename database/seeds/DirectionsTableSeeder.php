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
    $direction1=App\Direction::firstOrCreate(
                                            ["name"=>"Directeur Général"],
                                            ["chef_id"=> "5"],
                                            ["uuid"=>Str::uuid()
                                            ]);
    $direction2=App\Direction::firstOrCreate(
                                            ["name"=>"Direction de l'Evaluation et de la Certification"],
                                            ["chef_id"=> "2" ],["uuid"=>Str::uuid()
                                            ]);
    $direction3=App\Direction::firstOrCreate(
                                            ["name"=>"Direction de la planification des projets"],
                                            ["chef_id"=> "3" ],["uuid"=>Str::uuid()
                                            ]);
    $direction4=App\Direction::firstOrCreate(
                                            ["name"=>"Direction Administrative et Financière"],
                                            ["chef_id"=> "4"],
                                            ["uuid"=>Str::uuid()
                                            ]);
    $direction5=App\Direction::firstOrCreate(                                                 
                                            ["name"=>"Direction de l'Ingénierie et de la Formation"],
                                            ["chef_id"=> "1" ],["uuid"=>Str::uuid()
                                            ]);
                
    }
}
