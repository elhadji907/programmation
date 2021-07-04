<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1  = App\Role::firstOrCreate(["name"=>"Administrateur"],["uuid"=>Str::uuid()]);
        $role2  = App\Role::firstOrCreate(["name"=>"Gestionnaire"],["uuid"=>Str::uuid()]);
        $role3  = App\Role::firstOrCreate(["name"=>"Beneficiaire"],["uuid"=>Str::uuid()]);
        $role4  = App\Role::firstOrCreate(["name"=>"Comptable"],["uuid"=>Str::uuid()]);
        $role5  = App\Role::firstOrCreate(["name"=>"AComptable"],["uuid"=>Str::uuid()]);
        $role6  = App\Role::firstOrCreate(["name"=>"Courrier"],["uuid"=>Str::uuid()]);
        $role7  = App\Role::firstOrCreate(["name"=>"ACourrier"],["uuid"=>Str::uuid()]);
        $role8  = App\Role::firstOrCreate(["name"=>"DPP"],["uuid"=>Str::uuid()]);
        $role9  = App\Role::firstOrCreate(["name"=>"ADPP"],["uuid"=>Str::uuid()]);
        $role10 = App\Role::firstOrCreate(["name"=>"DIOF"],["uuid"=>Str::uuid()]);
        $role11 = App\Role::firstOrCreate(["name"=>"ADIOF"],["uuid"=>Str::uuid()]);
        $role12 = App\Role::firstOrCreate(["name"=>"DEC"],["uuid"=>Str::uuid()]);
        $role13 = App\Role::firstOrCreate(["name"=>"ADEC"],["uuid"=>Str::uuid()]);
        $role14 = App\Role::firstOrCreate(["name"=>"Ingenieur"],["uuid"=>Str::uuid()]);
        $role15 = App\Role::firstOrCreate(["name"=>"COM"],["uuid"=>Str::uuid()]);
        $role16 = App\Role::firstOrCreate(["name"=>"ACOM"],["uuid"=>Str::uuid()]);
        $role17 = App\Role::firstOrCreate(["name"=>"Visiteur"],["uuid"=>Str::uuid()]);
        $role18 = App\Role::firstOrCreate(["name"=>"Demandeur"],["uuid"=>Str::uuid()]);
        $role19 = App\Role::firstOrCreate(["name"=>"Operateur"],["uuid"=>Str::uuid()]);
        $role20 = App\Role::firstOrCreate(["name"=>"Nologin"],["uuid"=>Str::uuid()]);
        $role21 = App\Role::firstOrCreate(["name"=>"DAF"],["uuid"=>Str::uuid()]);
        $role22 = App\Role::firstOrCreate(["name"=>"FDAF"],["uuid"=>Str::uuid()]);
        $role23 = App\Role::firstOrCreate(["name"=>"RHDAF"],["uuid"=>Str::uuid()]);
        $role24 = App\Role::firstOrCreate(["name"=>"LOGDAF"],["uuid"=>Str::uuid()]);
        $role25 = App\Role::firstOrCreate(["name"=>"ADMIN"],["uuid"=>Str::uuid()]);
        $role26 = App\Role::firstOrCreate(["name"=>"PRDPP"],["uuid"=>Str::uuid()]);
        $role27 = App\Role::firstOrCreate(["name"=>"PLDPP"],["uuid"=>Str::uuid()]);
        $role28 = App\Role::firstOrCreate(["name"=>"Consultant"],["uuid"=>Str::uuid()]);
        $role29 = App\Role::firstOrCreate(["name"=>"SUIVI"],["uuid"=>Str::uuid()]);
        $role30 = App\Role::firstOrCreate(["name"=>"EVDEC"],["uuid"=>Str::uuid()]);
        $role31 = App\Role::firstOrCreate(["name"=>"Individuelle"],["uuid"=>Str::uuid()]);
        $role32 = App\Role::firstOrCreate(["name"=>"Collective"],["uuid"=>Str::uuid()]);


    }
}
