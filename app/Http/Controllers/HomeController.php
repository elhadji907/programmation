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
        /* return view('demandeurs.create'); */
      /*   $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $roles = Role::get();
        $civilites = User::select('civilite')->distinct()->get();
        $objets = Objet::select('name')->distinct()->get(); */
        /* $data=DB::table('domaines')->get(); */

        // dd($objets);
       /*  if ( Auth::user()->role()->first()->name != 'Demandeur' ) {            
            return view('layout.default',compact('date', 'roles', 'civilites', 'objets'));
        } else {           
        return view('demandeurs.show',compact('date', 'roles', 'civilites', 'objets'));
        } */

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
        $chart->dataset('STATISTIQUES', 'line', collect([$demandeurs, $courriers, $operateurs, $Personnels]));
        
        return view('layout.default', compact('courriers', 'recues', 'internes', 'departs','chart'));
        
    }
}
