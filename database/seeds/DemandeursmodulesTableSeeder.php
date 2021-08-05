<?php

use Illuminate\Database\Seeder;

class DemandeursmodulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Demandeur::class, 3)->create()->each(function ($u) {
            $u->modules()->save(factory(App\Module::class)->make());
        });
    
        factory(App\Module::class, 2)->create()->each(function ($u) {
            $u->demandeurs()->save(factory(App\Demandeur::class)->make());
        });
    }
}
