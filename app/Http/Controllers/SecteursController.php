<?php

namespace App\Http\Controllers;

use App\Secteur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SecteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('secteurs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secteurs.create');
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
               
                'name' =>  'required|string|max:50|unique:secteurs,name',
            ]
        );
        $secteur = new Secteur([      
            'name'           =>      $request->input('name'),

        ]);
        
        $secteur->save();
        return redirect()->route('secteurs.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function show(Secteur $secteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secteur = Secteur::find($id);
        return view('secteurs.update', compact('secteur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        $this->validate(
            $request, 
            [
                'name' =>  'required|string|max:50'
            ]);   
        $secteur = Secteur::find($id);
        $secteur->name  =   $request->input('name');
        $secteur->save();
        return redirect()->route('secteurs.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Secteur  $secteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secteur $secteur)
    {
        $secteur->delete();
        $message = $secteur->name.' a été supprimé(e)';
        return redirect()->route('secteurs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $secteurs=Secteur::get();
        return Datatables::of($secteurs)->make(true);
    }
}
