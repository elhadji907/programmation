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
        $this->call(TypesDirectionsTableSeeder::class);
        $this->call(DirectionsTableSeeder::class);
        $this->call(AdministrateursTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(NivauxsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(SituationsTableSeeder::class);
        $this->call(DiplomesTableSeeder::class);
        $this->call(TypesdemandesTableSeeder::class);
        $this->call(ObjetsTableSeeder::class);
        $this->call(InternesTableSeeder::class);
        $this->call(DepartsTableSeeder::class);
        $this->call(RecuesTableSeeder::class);
        // $this->call(DemandeursTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(BeneficiairesTableSeeder::class);
        $this->call(SecteursTableSeeder::class);
        $this->call(DomainesTableSeeder::class);
        $this->call(QualificationsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FonctionsTableSeeder::class);
        $this->call(PersonnelsTableSeeder::class);
        $this->call(StructuresTableSeeder::class);
        $this->call(OperateursTableSeeder::class);
        $this->call(ProgrammesTableSeeder::class);
        $this->call(LocalitesTableSeeder::class);
        
    }
}
