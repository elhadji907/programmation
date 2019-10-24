<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);        
        $this->call(TypesCourriersTableSeeder::class);
        $this->call(DirectionsTableSeeder::class);
        $this->call(AdministrateursTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(RecuesTableSeeder::class);
        $this->call(DepartsTableSeeder::class);
        $this->call(InternesTableSeeder::class);
        $this->call(BeneficiairesTableSeeder::class);
        
    }
}
