<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('regions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regions.create');
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
               
                'nom' =>  'required|string|max:50|unique:regions,nom,NULL,id,deleted_at,NULL',
            ]
        );
        $region = new region([      
            'nom'           =>      $request->input('nom'),

        ]);
        
        $region->save();
        return redirect()->route('regions.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $id = $region->id;

        return view('regions.update', compact('region','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->validate(
            $request, 
            [
                'nom' =>  'required|string|unique:regions,nom,'.$region->id
            ]); 

        $region->nom  =   $request->input('nom');
        $region->save();
        return redirect()->route('regions.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        
        if (isset($region->departements) AND $region->departements != "") {
            dd($region->departements);
        } else {
            dd('ne pas supprimer');
        }

        $region->delete();
        $message = $region->nom.' a été supprimé(e)';
        return redirect()->route('regions.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $regions=Region::withCount('departements')->with('departements.demandeurs')->withCount('demandeurs')->with('departements.modules')->get();
        return Datatables::of($regions)->make(true);
    }
}
