<?php

namespace App\Http\Controllers;

use App\Depense;
use App\Projet;
use App\Activite;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DepensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depenses = Depense::all();

        return view('depenses.index', compact('depenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
               
                'name'  =>  'required|string|max:200|unique:projets,name',
                'sigle' =>  'required|string|max:20|unique:projets,sigle',
                'debut' =>  'date',
                'fin'   =>  'date',
            ]
        );
        $projet = new Projet([      
            'name'              =>      $request->input('name'),
            'sigle'             =>      $request->input('sigle'),
            'debut'             =>      $request->input('debut'),
            'fin'               =>      $request->input('fin'),
            'budjet'            =>      $request->input('budjet'),

        ]);
        
        $projet->save();
        return redirect()->route('projets.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depenses = Depense::find($id);

        $activite = $depenses->activite;
        $projet = $depenses->projet;

        $activites = Activite::get();
        $projets = Projet::get();
        /* dd("$secteurs"); */
        return view('depenses.update', compact('depenses','activite','projet','activites','projets','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
