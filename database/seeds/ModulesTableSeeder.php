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
         $module1 =  App\Module::firstOrCreate(["name"=>"Accueil"],["domaines_id"=>"1"],["qualifications_id"=>"1"],["uuid"=>Str::uuid()]);
         $module2 =  App\Module::firstOrCreate(["name"=>"Assistanat de direction"],["domaines_id"=>"1"],["qualifications_id"=>"1"],["uuid"=>Str::uuid()]);
         $module3 =  App\Module::firstOrCreate(["name"=>"Gestion administrative"],["domaines_id"=>"1"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module4 =  App\Module::firstOrCreate(["name"=>"Secrétariat"],["domaines_id"=>"1"],["qualifications_id"=>"1"],["uuid"=>Str::uuid()]);

         $module5 =  App\Module::firstOrCreate(["name"=>"Laveur"],["domaines_id"=>"34"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module6 =  App\Module::firstOrCreate(["name"=>"Graisseur"],["domaines_id"=>"34"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module7 =  App\Module::firstOrCreate(["name"=>"Pompiste"],["domaines_id"=>"33"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module8 =  App\Module::firstOrCreate(["name"=>"Rayonniste"],["domaines_id"=>"9"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module9 =  App\Module::firstOrCreate(["name"=>"Caissier"],["domaines_id"=>"9"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module10 =  App\Module::firstOrCreate(["name"=>"Chef de boutique"],["domaines_id"=>"9"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);
         $module11 =  App\Module::firstOrCreate(["name"=>"Manager de station"],["domaines_id"=>"9"],["qualifications_id"=>"2"],["uuid"=>Str::uuid()]);

    }
}
