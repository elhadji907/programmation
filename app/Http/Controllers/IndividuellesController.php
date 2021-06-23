<?php

namespace App\Http\Controllers;

use App\Individuelle;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Departement;
use App\Diplome;
use App\Module;
use App\Programme;
use App\User;


class IndividuellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuelles = Individuelle::all();

        //dd($individuelles);

        return view('individuelles.index', compact('individuelles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
      
        return view('individuelles.create',compact('departements', 'diplomes', 'civilites', 'modules','programmes'));
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
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function show(Individuelle $individuelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function edit(Individuelle $individuelle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Individuelle $individuelle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Individuelle $individuelle)
    {
        //
    }
    public function list(Request $request)
    {
        $modules=Individuelle::with('demandeur.modules')->get();
        return Datatables::of($modules)->make(true);

    }
}
