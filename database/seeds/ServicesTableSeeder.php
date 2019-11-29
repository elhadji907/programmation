<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Service1=App\Service::firstOrCreate(
            ["name"=>"Cellule de comminucation"],
            ["sigle"=> "COM" ],
            ["chef_id"=> "6"],["uuid"=>Str::uuid()
            ]);
        $Service2=App\Service::firstOrCreate(
            ["name"=>"Service construction "],
            ["sigle"=> "CONS" ],
            ["chef_id"=> "7"],["uuid"=>Str::uuid()
            ]);
        $Service3=App\Service::firstOrCreate(
            ["name"=>"Service Informatique"],
            ["sigle"=> "SI" ],
            ["chef_id"=> "8"],["uuid"=>Str::uuid()
            ]);
        $Service4=App\Service::firstOrCreate(
            ["name"=>"Service d'Edition de manuel"],
            ["sigle"=> "EDITION" ],
            ["chef_id"=> "9"],["uuid"=>Str::uuid()
            ]);
        $Service5=App\Service::firstOrCreate(
            ["name"=>"Aucun(e)"],
            ["sigle"=> "Aucun" ],
            ["chef_id"=> " "],["uuid"=>Str::uuid()
            ]);
    }
}
