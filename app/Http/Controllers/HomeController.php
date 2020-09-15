<?php

namespace App\Http\Controllers;


use App\Charts\Courrierchart;
use App\Role;
use App\Objet;
use App\User;
use DB;
use Auth;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $courriers = \App\Courrier::get()->count();
        $demandeurs = \App\Demandeur::get()->count();
        $operateurs = \App\Operateur::get()->count();
        $Personnels = \App\Personnel::get()->count();
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['Demandeurs', 'Courriers', 'Operateurs', 'Personnel']);
        $chart->dataset('STATISTIQUES', 'bar', collect([$demandeurs, $courriers, $operateurs, $Personnels]))->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2", "#3cba9f", '#ff3838'],
        ]);
        
        $localites = \App\Localite::with('demandeurs.localite')->get();
        $modules = \App\Module::with('demandeurs.modules','demandeurs.localite')->get();
        /* dd($localites); */
        return view('localites.detail', compact('localites','modules'));
        /* return view('courriers.index', compact('courriers', 'recues', 'internes', 'departs','chart')); */
        
    }
}
