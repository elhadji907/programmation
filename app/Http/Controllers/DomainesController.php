<?php

namespace App\Http\Controllers;

use Auth;
use App\Domaine;
use App\Secteur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DomainesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('domaines.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::get();
        return view('domaines.create', compact('secteurs'));
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
               
                'name'      =>  'required|string|max:50|unique:domaines,name',
                'secteur'   =>  'required|string',
            ]
        );
        $secteur_id = $request->input('secteur');
       /*  dd($secteur_id); */
        $domaine = new Domaine([      
            'name'           =>      $request->input('name'),
            'secteurs_id'    =>      $secteur_id

        ]);


        
        $domaine->save();
        return redirect()->route('domaines.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine $domaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domaines = Domaine::find($id);
        $secteur = $domaines->secteur;
        $secteurs = Secteur::get();
        /* dd("$secteurs"); */
        return view('domaines.update', compact('domaines','secteurs','secteur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'name'      =>  'required|string|max:50',
                'secteur'   =>  'required|string'
            ]);   
        $domaine = Domaine::find($id);
        $domaine->name          =   $request->input('name');
        $domaine->secteurs_id   =   $request->input('secteur');
        $domaine->save();
        return redirect()->route('domaines.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domaine  $domaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();
        $message = $domaine->name.' a été supprimé(e)';
        return redirect()->route('domaines.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $domaines=Domaine::with('secteur')->get();
        return Datatables::of($domaines)->make(true);
    }
}
