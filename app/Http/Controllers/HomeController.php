<?php

namespace App\Http\Controllers;


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
        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $roles = Role::get();
        $civilites = User::select('civilite')->distinct()->get();
        $objets = Objet::select('name')->distinct()->get();
        /* $data=DB::table('domaines')->get(); */

        // dd($objets);
        if ( Auth::user()->role()->first()->name != 'Demandeur' ) {            
            return view('layout.default',compact('date', 'roles', 'civilites', 'objets'));
        } else {           
        return view('demandeurs.show',compact('date', 'roles', 'civilites', 'objets'));
        }
        
    }
}
