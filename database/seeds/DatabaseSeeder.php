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
        $this->call(NiveauxTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(DiplomesTableSeeder::class);
        $this->call(InternesTableSeeder::class);
        $this->call(DepartsTableSeeder::class);
        $this->call(RecuesTableSeeder::class);
        $this->call(ProgrammesTableSeeder::class);
        $this->call(LieuxsTableSeeder::class);
        $this->call(BordereausTableSeeder::class);
        // $this->call(DemandeursTableSeeder::class);
        // $this->call(IndividuellesTableSeeder::class);
        // $this->call(VillagesTableSeeder::class);
        // $this->call(BeneficiairesTableSeeder::class);
        // $this->call(ImputationsTableSeeder::class);
        // $this->call(ProjetsTableSeeder::class);
        // $this->call(DafsTableSeeder::class);
        // $this->call(SecteursTableSeeder::class);
        // $this->call(DomainesTableSeeder::class);
        //$this->call(QualificationsTableSeeder::class);
        // $this->call(ModulesTableSeeder::class);
        // $this->call(BordereausTableSeeder::class);
        // $this->call(OrdresmissionsTableSeeder::class);
        // $this->call(EtatsTableSeeder::class);
        // $this->call(EtatprevisTableSeeder::class);
        // $this->call(FacturesTableSeeder::class);
        // $this->call(BanquesTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);
        //$this->call(FonctionsTableSeeder::class);
        //$this->call(PersonnelsTableSeeder::class);
        //$this->call(StructuresTableSeeder::class);
        //$this->call(OperateursTableSeeder::class);
        //$this->call(RegionsTableSeeder::class);
        //$this->call(DepartementsTableSeeder::class);
        
    }
}
