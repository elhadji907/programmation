<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activites.create');
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
               
                'name' =>  'required|string|max:50|unique:activites,name',
            ]
        );
        $activite = new activite([      
            'name'           =>      $request->input('name'),
            'lieu'           =>      $request->input('lieu'),

        ]);
        
        $activite->save();
        return redirect()->route('activites.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function show(Activite $activite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activite::find($id);
        return view('activites.update', compact('activite','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'name' =>  'required|string|max:50'
            ]);   
        $activite = activite::find($id);
        $activite->name  =   $request->input('name');
        $activite->lieu  =   $request->input('lieu');
        $activite->save();
        return redirect()->route('activites.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activite $activite)
    {
        $activite->delete();
        $message = $activite->name.' a été supprimé(e)';
        return redirect()->route('activites.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $activites=Activite::get();
        return Datatables::of($activites)->make(true);
    }
}
