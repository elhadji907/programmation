<?php

namespace App\Http\Controllers;

use App\Village;
use Illuminate\Http\Request;
use App\Helpers\PCollection;
use Yajra\Datatables\Datatables;

class VillagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages=Village::all()->load(['chef.user','commune.arrondissement.departement.region'])->where('chef.user','!=',null);
        return view('villages.index',compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('villages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_du_village'     =>  'required',
            'nom_du_chef_de_village'     =>  'required',
            'nom_de_la_commune'     =>  'required'
        ]);
        $village = new Village([
            'nom'     =>  $request->get('nom_du_village'),
            'chef_id'     =>  $request->get('nom_du_chef_de_village'),
            'communes_id'     =>  $request->get('nom_de_la_commune')
        ]);

        $message = "Village ajouter avec succès";

        $village->save();
        return redirect()->route('villages.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        //
    }

    /* public function list(Request $request)
    {
        $villages=Village::with('chef.user','commune.arrondissement.departement.region')->get();
        return Datatables::of($villages)->make(true);
    } */
}
