<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesCourriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1=App\TypesCourrier::firstOrCreate(["name"=>"Courriers arrives"],["categorie"=>"arrives"],["uuid"=>Str::uuid()]);
        $type2=App\TypesCourrier::firstOrCreate(["name"=>"Courriers departs"],["categorie"=>"departs"],["uuid"=>Str::uuid()]);
        $type3=App\TypesCourrier::firstOrCreate(["name"=>"Courriers internes"],["categorie"=>"internes"],["uuid"=>Str::uuid()]);
        $type4=App\TypesCourrier::firstOrCreate(["name"=>"Bordereau"],["categorie"=>"bordereaus"],["uuid"=>Str::uuid()]);
        $type5=App\TypesCourrier::firstOrCreate(["name"=>"Factures daf"],["categorie"=>"factures"],["uuid"=>Str::uuid()]);
        $type6=App\TypesCourrier::firstOrCreate(["name"=>"Banques"],["categorie"=>"banques"],["uuid"=>Str::uuid()]);
        $type7=App\TypesCourrier::firstOrCreate(["name"=>"Tresors"],["categorie"=>"tresors"],["uuid"=>Str::uuid()]);
        $type8=App\TypesCourrier::firstOrCreate(["name"=>"Missions"],["categorie"=>"missions"],["uuid"=>Str::uuid()]);
        $type9=App\TypesCourrier::firstOrCreate(["name"=>"Etats"],["categorie"=>"etats"],["uuid"=>Str::uuid()]);
        $type10=App\TypesCourrier::firstOrCreate(["name"=>"Etats previs"],["categorie"=>"previs"],["uuid"=>Str::uuid()]);
        $type11=App\TypesCourrier::firstOrCreate(["name"=>"FADS"],["categorie"=>"fads"],["uuid"=>Str::uuid()]);
        $type11=App\TypesCourrier::firstOrCreate(["name"=>"Operateur"],["categorie"=>"Operateur"],["uuid"=>Str::uuid()]);
    }
}
