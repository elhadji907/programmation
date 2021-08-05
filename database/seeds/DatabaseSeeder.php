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
        $this->call(AdministrateursTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(VillagesTableSeeder::class);
        $this->call(NiveauxTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(DiplomesTableSeeder::class);
        $this->call(ActivitesTableSeeder::class);
        $this->call(ProjetsTableSeeder::class);
        $this->call(InternesTableSeeder::class);
        $this->call(DepartsTableSeeder::class);
        $this->call(RecuesTableSeeder::class);
        $this->call(ProgrammesTableSeeder::class);
        $this->call(LieuxsTableSeeder::class);
        $this->call(ListesTableSeeder::class);
        $this->call(BordereausTableSeeder::class);
        $this->call(FacturesdafsTableSeeder::class);
        $this->call(TresorsTableSeeder::class);
        $this->call(BanquesTableSeeder::class);
        $this->call(MissionsTableSeeder::class);
        $this->call(EtatsTableSeeder::class);
        $this->call(EtatprevisTableSeeder::class);
        $this->call(FadsTableSeeder::class);
        $this->call(ImputationsTableSeeder::class);
        $this->call(FonctionsTableSeeder::class);
        //$this->call(SecteursTableSeeder::class);
        //$this->call(DomainesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(TypesDirectionsTableSeeder::class);
        $this->call(DirectionsTableSeeder::class);
        $this->call(DepensesTableSeeder::class);
        $this->call(LieuxsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(StatutsTableSeeder::class);
        $this->call(TypesdemandesTableSeeder::class);
        $this->call(TypesFormationsTableSeeder::class);
        $this->call(IngenieursTableSeeder::class);
        $this->call(NineasTableSeeder::class);
        $this->call(IndividuellesTableSeeder::class);
        $this->call(CollectivesTableSeeder::class);
        $this->call(FcollectivesTableSeeder::class);
        $this->call(FindividuellesTableSeeder::class);
        $this->call(TypesOperateursTableSeeder::class);
        $this->call(OperateursTableSeeder::class);
        //$this->call(FormationsTableSeeder::class);
        //$this->call(DemandeursmodulesTableSeeder::class);
        //$this->call(BeneficiairesTableSeeder::class);
        //$this->call(QualificationsTableSeeder::class);
        //$this->call(ModulesTableSeeder::class);
        //$this->call(OrdresmissionsTableSeeder::class);
        //$this->call(EtatsTableSeeder::class);
        //$this->call(EtatprevisTableSeeder::class);
        //$this->call(FacturesTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);
        //$this->call(PersonnelsTableSeeder::class);
        //$this->call(StructuresTableSeeder::class);
        //$this->call(RegionsTableSeeder::class);
        //$this->call(DepartementsTableSeeder::class);
        
    }
}
