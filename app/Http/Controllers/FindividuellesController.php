<?php

namespace App\Http\Controllers;

use App\Findividuelle;
use App\Ingenieur;
use App\Module;
use App\Departement;
use Carbon\Carbon;
use App\Programme;
use Illuminate\Http\Request;

class FindividuellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $findividuelles = Findividuelle::all();

       /*  dd($findividuelles); */

        return view('findividuelles.index', compact('findividuelles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       $ingenieur_id=$request->input('ingenieur');
       $ingenieur=\App\Ingenieur::find($ingenieur_id);
       
       $modules = Module::distinct('name')->get()->pluck('name','id')->unique();       
       $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
       $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
       
       $date_debut = Carbon::now();
       $date_fin = Carbon::now()->addMonth();

        return view('findividuelles.create', compact('ingenieur','modules','departements','date_debut','date_fin','programmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function show(Findividuelle $findividuelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function edit(Findividuelle $findividuelle)
    {
        $name_ingenieur = $findividuelle->formation->ingenieur->name;

        $list_ingenieurs = Ingenieur::distinct('name')->get()->pluck('name','name')->unique();

        $ingenieurs = Ingenieur::all();

        return view('findividuelles.update',compact('findividuelle', 'ingenieurs','list_ingenieurs','name_ingenieur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Findividuelle $findividuelle)
    {
        dd($findividuelle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Findividuelle $findividuelle)
    {
        //
    }
}
