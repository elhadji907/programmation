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
                                                    ["name"=>"Direction de l'Ingénierie et de la Formation"],
                                                    ["sigle"=> "DIOF" ],
                                                    ["chef_id"=> "1" ],["uuid"=>Str::uuid()
                                                    ]);
            $direction2=App\Direction::firstOrCreate(
                                                    ["name"=>"Direction de l'Evaluation et de la Certification"],
                                                    ["sigle"=> "DEC" ],
                                                    ["chef_id"=> "2" ],["uuid"=>Str::uuid()
                                                    ]);
            $direction3=App\Direction::firstOrCreate(
                                                    ["name"=>"Direction de la planification des projets"],
                                                    ["sigle"=> "DPP" ],
                                                    ["chef_id"=> "3" ],["uuid"=>Str::uuid()
                                                    ]);
            $direction4=App\Direction::firstOrCreate(
                                                    ["name"=>"Cellule de comminucation"],
                                                    ["sigle"=> "COM" ],
                                                    ["chef_id"=> "4"],["uuid"=>Str::uuid()
                                                    ]);
            $direction5=App\Direction::firstOrCreate(
                                                    ["name"=>"Service construction "],
                                                    ["sigle"=> "CONS" ],
                                                    ["chef_id"=> "5"],["uuid"=>Str::uuid()
                                                    ]);
            $direction6=App\Direction::firstOrCreate(
                                                    ["name"=>"Service Informatique"],
                                                    ["sigle"=> "SI" ],
                                                    ["chef_id"=> "6"],["uuid"=>Str::uuid()
                                                    ]);
            $direction7=App\Direction::firstOrCreate(
                                                    ["name"=>"Direction Administrative et Financière"],
                                                    ["sigle"=> "DAF" ],
                                                    ["chef_id"=> "7"],
                                                    ["uuid"=>Str::uuid()
                                                    ]);
            $direction8=App\Direction::firstOrCreate(
                                                    ["name"=>"Service d'Edition de manuel"],
                                                    ["sigle"=> "EDITION" ],
                                                    ["chef_id"=> "8"],["uuid"=>Str::uuid()
            ]);
            $direction9=App\Direction::firstOrCreate(
                                                    ["name"=>"Directeur Général"],
                                                    ["sigle"=> "DG" ],
                                                    ["chef_id"=> "9"],
                                                    ["uuid"=>Str::uuid()
                                                    ]);
            $direction10=App\Direction::firstOrCreate(
                                                    ["name"=>"Aucun(e)"],
                                                    ["sigle"=> "Aucun" ],
                                                    ["chef_id"=> "10"],["uuid"=>Str::uuid()
                                                    ]);
                
    }
}
