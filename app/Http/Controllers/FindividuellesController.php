<?php

namespace App\Http\Controllers;

use App\Findividuelle;
use App\Individuelle;
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

    public function selectdindividuelles($id_dept, $id_module)
    {
        $departements = Departement::find($id_dept);
        $modules = Module::find($id_module);
        $nom_module = $modules->name;
        $nom_departement = $departements->nom;
        $nom_region = $departements->region->nom;


        $individuelles = Individuelle::all()->load(['demandeur'])->where('demandeur.departement.region.nom','==',$nom_region);
                
        return view('findividuelles.selectdindividuelles', compact('individuelles','departements','modules','nom_module','nom_departement','nom_region'));
    }

    public function adddindividuelles(){
        
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
    public function update(Request $request, $id)
    {
        $individuelles = Individuelle::find($id);

        dd($individuelles);

        dd($findividuelle->demandeur);
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

    
    public function list(Request $request)
    {
        $individuelles=Individuelle::with('individuelles.demandeur')->get();
        dd($individuelles);
        return Datatables::of($individuelles)->make(true);

    }
}
