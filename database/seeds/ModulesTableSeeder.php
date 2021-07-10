<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Helpers\SnNameGenerator as SnmG;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=\Faker\Factory::create();
        $secteurs_json=Storage::get("secteurs.min.json");
        $secteurs=json_decode($secteurs_json);
    
        foreach((array)$secteurs->secteur as $secteur){
            //echo "=============secteur=========".$secteur->name."==========".PHP_EOL;
            $secteur_=App\Secteur::firstOrCreate(["name"=>$secteur->name]);
            foreach((array)$secteur->domaine as $domaine){
                $domaine_=App\Domaine::firstOrNew(["name"=>$domaine->name]);
                $secteur_->domaines()->save($domaine_);
               // echo "---domaine----".$domaine->name." id: ".$domaine->attributes->id.PHP_EOL;
                foreach((array)$domaine->module as $module){
                    if(App\Module::count()<150){
                    $module_=App\Module::firstOrNew(["name"=>$module->name]);
                    $domaine_->modules()->save($module_);
                    echo "-----module----".$module->name." id: ".$module->attributes->id.PHP_EOL;
                    
                }
                //arréter l'execution du script après 5 tours
                else{
                    break 3;
                }
                
            }
        }
        }
    }
}
