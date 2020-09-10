<?php

namespace App\Http\Controllers;

use App\Localite;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LocalitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('localites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localites.create');
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
               
                'name' =>  'required|string|max:50|unique:localites,name',
            ]
        );
        $localite = new Localite([      
            'name'           =>      $request->input('name'),

        ]);
        
        $localite->save();
        return redirect()->route('localites.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localite  $localite
     * @return \Illuminate\Http\Response
     */
    public function show(Localite $localite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localite  $localite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localite = Localite::find($id);
        return view('localites.update', compact('localite','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localite  $localite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
        $this->validate(
            $request, 
            [
                'name' =>  'required|string|max:50'
            ]);   
        $localite = Localite::find($id);
        $localite->name  =   $request->input('name');
        $localite->save();
        return redirect()->route('localites.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localite  $localite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localite $localite)
    {
        $localite->delete();
        $message = $localite->name.' a été supprimé(e)';
        return redirect()->route('localites.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $localites=Localite::with('demandeurs')->get();
        return Datatables::of($localites)->make(true);
    }
}
