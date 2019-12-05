<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $module1 =  App\Module::firstOrCreate(["name"=>"Accueil"],["domaines_id"=>"1"],["uuid"=>Str::uuid()]);
         $module2 =  App\Module::firstOrCreate(["name"=>"Assistanat de direction"],["domaines_id"=>"1"],["uuid"=>Str::uuid()]);
         $module3 =  App\Module::firstOrCreate(["name"=>"Gestion administrative"],["domaines_id"=>"1"],["uuid"=>Str::uuid()]);
         $module4 =  App\Module::firstOrCreate(["name"=>"Secrétariat"],["domaines_id"=>"1"],["uuid"=>Str::uuid()]);

    }
}
