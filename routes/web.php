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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
    ], function()
    {            
        Route::get('profiles/{user}', 'ProfilesController@show')->name('profiles.show');
        Route::get('profiles/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
        Route::patch('profiles/{user}', 'ProfilesController@update')->name('profiles.update');
        Route::get('/administrateurs/list', 'AdministrateursController@list')->name('administrateurs.list');
        Route::get('/gestionnaires/list', 'GestionnairesController@list')->name('gestionnaires.list');

        Route::get('/courriers/list', 'CourriersController@list')->name('courriers.list');
        Route::get('/recues/list', 'RecuesController@list')->name('recues.list');
        Route::get('/departs/list', 'DepartsController@list')->name('departs.list');
        Route::get('/internes/list', 'InternesController@list')->name('internes.list');

        Route::get('postes/create', 'PostesController@create')->name('postes.create');
        Route::post('postes', 'PostesController@store')->name('postes.store');
        Route::get('postes/{poste}', 'PostesController@show')->name('postes.show');

        Route::resource('/administrateurs', 'AdministrateursController');
        Route::resource('/gestionnaires', 'GestionnairesController');
        Route::resource('/courriers', 'CourriersController');
        Route::resource('/recues', 'RecuesController');
        Route::resource('/departs', 'DepartsController');
        Route::resource('/internes', 'InternesController');

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
