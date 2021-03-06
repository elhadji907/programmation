<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    });

/* Auth::routes(); */
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
    ], function()
    { 
        Route::get('/villages.selectvillage', function() { return view('villages.selectvillage'); })->name('villages.selectvillage');
        Route::get('/directions.selectemployees', function() { return view('directions.selectemployees'); })->name('directions.selectemployees');
        Route::get('/findividuelles.selectingenieurs', function() { return view('findividuelles.selectingenieurs'); })->name('findividuelles.selectingenieurs');
        Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles.show');
        Route::get('/profiles/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
        Route::patch('/profiles/{user}', 'ProfilesController@update')->name('profiles.update');
        Route::get('/administrateurs/list', 'AdministrateursController@list')->name('administrateurs.list');
        Route::get('/formations/list', 'FormationsController@list')->name('formations.list');
        Route::get('/users/list', 'UsersController@list')->name('users.list');
        Route::get('/employees/list', 'EmployeesController@list')->name('employees.list');
        Route::get('/gestionnaires/list', 'GestionnairesController@list')->name('gestionnaires.list');
        Route::get('/directions/list', 'DirectionsController@list')->name('directions.list');
        Route::get('/services/list', 'ServicesController@list')->name('services.list');
        Route::get('/demandeurs/list', 'DemandeursController@list')->name('demandeurs.list');
        Route::get('/individuelles/list', 'IndividuellesController@list')->name('individuelles.list');
        Route::get('/findividuelles/list', 'FindividuellesController@list')->name('findividuelles.list');
        Route::get('/collectives/list', 'CollectivesController@list')->name('collectives.list');
        Route::get('/fcollectives/list', 'FcollectivesController@list')->name('fcollectives.list');
        Route::get('/beneficiaires/list', 'BeneficiairesController@list')->name('beneficiaires.list');
        Route::get('/domaines/list', 'DomainesController@list')->name('domaines.list');
        Route::get('/diplomes/list', 'DiplomesController@list')->name('diplomes.list');
        Route::get('/modules/list', 'ModulesController@list')->name('modules.list');
        Route::get('/secteurs/list', 'SecteursController@list')->name('secteurs.list');
        Route::get('/activites/list', 'ActivitesController@list')->name('activites.list');
        Route::get('/projets/list', 'ProjetsController@list')->name('projets.list');
        Route::get('/depenses/list', 'DepensesController@list')->name('depenses.list');
        Route::get('/nivauxs/list', 'NivauxsController@list')->name('nivauxs.list');
        Route::get('/options/list', 'OptionsController@list')->name('options.list');
        Route::get('/villages/list', 'VillagesController@list')->name('villages.list');
        Route::get('/operateurs/list', 'OperateursController@list')->name('operateurs.list');
        Route::get('/programmes/list', 'ProgrammesController@list')->name('programmes.list');
        Route::get('/localites/list', 'LocalitesController@list')->name('localites.list');
        Route::get('/nineas/list', 'NineasController@list')->name('nineas.list');
        Route::get('/ingenieurs/list', 'IngenieursController@list')->name('ingenieurs.list');

        //fonction pour pdcej
        Route::get('/pdcej', 'LocalitesController@pdcej')->name('localites.pdcej');
        Route::get('/lister/{localitesliste}/{nom_module}', 'LocalitesController@lister')->name('localites.lister');
        Route::get('/lister_r/{localitesliste}/{nom_module}', 'LocalitesController@lister_r')->name('localites.lister_r');
        Route::get('/lister_an/{localitesliste}/{nom_module}', 'LocalitesController@lister_an')->name('localites.lister_an');
        Route::get('/lister_at/{localitesliste}/{nom_module}', 'LocalitesController@lister_at')->name('localites.lister_at');
        Route::get('/lister_pres/{localitesliste}/{nom_module}', 'LocalitesController@lister_pres')->name('localites.lister_pres');
        Route::get('/lister_cours/{localitesliste}/{nom_module}', 'LocalitesController@lister_cours')->name('localites.lister_cours');
        Route::get('/lister_abs/{localitesliste}/{nom_module}', 'LocalitesController@lister_abs')->name('localites.lister_abs');
        Route::get('/lister_term/{localitesliste}/{nom_module}', 'LocalitesController@lister_term')->name('localites.lister_term');

        Route::get('/courriers/list', 'CourriersController@list')->name('courriers.list');
        Route::get('/factures/list', 'FacturesController@list')->name('factures.list');
        Route::get('/facturesdafs/list', 'FacturesdafsController@list')->name('facturesdafs.list');
        Route::get('/etats/list', 'EtatsController@list')->name('etats.list');
        Route::get('/previsions/list', 'EtatsprevisController@list')->name('previsions.list');
        Route::get('/banques/list', 'BanquesController@list')->name('banques.list');
        Route::get('/missions/list', 'MissionsController@list')->name('missions.list');
        Route::get('/bordereaus/list', 'BordereausController@list')->name('bordereaus.list');
        Route::get('/listes/list', 'ListesController@list')->name('listes.list');
        Route::get('/tresors/list', 'TresorsController@list')->name('tresors.list');
        Route::get('/presentations/list', 'PresentationsController@list')->name('presentations.list');
        Route::get('/recues/list', 'RecuesController@list')->name('recues.list');
        Route::get('/departs/list', 'DepartsController@list')->name('departs.list');
        Route::get('/internes/list', 'InternesController@list')->name('internes.list');
        Route::get('/departements/list', 'DepartementsController@list')->name('departements.list');
        Route::get('/regions/list', 'RegionsController@list')->name('regions.list');

        Route::get('/selectdindividuelles/{id_dept}/{id_module}/{id_form}', 'FindividuellesController@selectdindividuelles')->name('findividuelles.selectdindividuelles');
        
        Route::get('adddindividuelles/{id_ind}/{id_form}', 'FindividuellesController@adddindividuelles')->name('adddindividuelles');
        Route::get('deleteindividuelles/{id_ind}/{id_form}', 'FindividuellesController@deleteindividuelles')->name('deleteindividuelles');

        Route::get('postes/create', 'PostesController@create')->name('postes.create');
        Route::post('postes', 'PostesController@store')->name('postes.store');
        Route::get('postes/{poste}', 'PostesController@show')->name('postes.show');
        Route::get('showFromNotification/{courrier}/{notification}', 'CourriersController@showFromNotification')->name('courriers.showFromNotification');

        Route::post('comments/{courrier}', 'CommentsController@store')->name('comments.store');
        Route::post('commentReply/{comment}', 'CommentsController@storeCommentReply')->name('comments.storeReply');

        Route::resource('/administrateurs', 'AdministrateursController');
        Route::resource('/formations', 'FormationsController');
        Route::resource('/nineas', 'NineasController');
        Route::resource('/users', 'UsersController');
        Route::resource('/employees', 'EmployeesController');
        Route::resource('/gestionnaires', 'GestionnairesController');
        Route::resource('/courriers', 'CourriersController');
        Route::resource('/factures', 'FacturesController');
        Route::resource('/facturesdafs', 'FacturesdafsController');
        Route::resource('/etats', 'EtatsController');
        Route::resource('/previsions', 'EtatsprevisController');
        Route::resource('/banques', 'BanquesController');
        Route::resource('/missions', 'MissionsController');
        Route::resource('/bordereaus', 'BordereausController');
        Route::resource('/listes', 'ListesController');
        Route::resource('/tresors', 'TresorsController');
        Route::resource('/presentations', 'PresentationsController');
        Route::resource('/recues', 'RecuesController');
        Route::resource('/departs', 'DepartsController');
        Route::resource('/internes', 'InternesController');
        Route::resource('/directions', 'DirectionsController');
        Route::resource('/services', 'ServicesController');
        Route::resource('/demandeurs', 'DemandeursController');
        Route::resource('/individuelles', 'IndividuellesController');
        Route::resource('/findividuelles', 'FindividuellesController');
        Route::resource('/collectives', 'CollectivesController');
        Route::resource('/fcollectives', 'FcollectivesController');
        Route::resource('/beneficiaires', 'BeneficiairesController');
        Route::resource('/domaines', 'DomainesController');
        Route::resource('/diplomes', 'DiplomesController');
        Route::resource('/modules', 'ModulesController');
        Route::resource('/secteurs', 'SecteursController');
        Route::resource('/activites', 'ActivitesController');
        Route::resource('/projets', 'ProjetsController');
        Route::resource('/depenses', 'DepensesController');
        Route::resource('/nivauxs', 'NivauxsController');
        Route::resource('/options', 'OptionsController');
        Route::resource('/villages', 'VillagesController');
        Route::resource('/operateurs', 'OperateursController');
        Route::resource('/programmes', 'ProgrammesController');
        Route::resource('/localites', 'LocalitesController');
        Route::resource('/ingenieurs', 'IngenieursController');
        Route::resource('/departements', 'DepartementsController');
        Route::resource('/regions', 'RegionsController');

    }         
);



//gestion des roles par niveau d'autorisation

Route::get('loginfor/{rolename?}',function($rolename=null){
if(!isset($rolename)){
    return view('auth.loginfor');
}else{
    $role=App\Role::where('name',$rolename)->first();
    if($role){
        $user=$role->users()->first();
        Auth::login($user,true);
        return redirect()->route('home');
    }
}
return redirect()->route('login');
})->name('loginfor');
