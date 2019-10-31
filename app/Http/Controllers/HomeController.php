<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courriers = \App\Courrier::get()->count();
        //$formations = \App\Formation::get()->count();
        //$operateurs = \App\Operateur::get()->count();
        //$demandes = \App\Demande::get()->count();
        return view('layout.default', compact('courriers'));
    }
}
