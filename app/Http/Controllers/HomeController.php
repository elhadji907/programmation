<?php

namespace App\Http\Controllers;


use App\Charts\Courrierchart;
use App\Role;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Courrier;
class HomeController extends Controller
{  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courrier = \App\Courrier::get()->count();
        $demandeurs = \App\Demandeur::get()->count();


        $courriers = Courrier::all();


       // dd($couriers);

        //$operateurs = \App\Operateur::get()->count();
        //$Personnels = \App\Personnel::get()->count();


        $chart      = \App\Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Demandeurs', 'Courriers']);
        $chart->dataset('STATISTIQUES', 'bar', collect([$demandeurs, $courriers]))->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2", "#3cba9f", '#ff3838'],
        ]);
        
        //$localites = \App\Localite::with('demandeurs.localite')->get();
        //$modules = \App\Module::with('demandeurs.modules','demandeurs.localite')->get();
        /* dd($localites); */
        /* return view('localites.detail', compact('localites','modules')); */

        if (Auth::user()->role->name === "Administrateur") {
            return view('courriers.index', compact('courriers','courrier', 'recues', 'internes', 'departs','chart'));           
        } else {
            
        $demandeurs = \App\Demandeur::all();

        $user = auth()->user();

        $user_connect  =  auth::user()->demandeur;


        return view('profiles.show', compact('user','courriers','user_connect','demandeurs'));

        }
        
    }
}
