<?php

namespace App\Http\Controllers;

use App\Projet;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projets = Projet::all();

        return view('projets.index', compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projets.create');
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
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::find($id);
        return view('projets.update', compact('projet','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $this->validate(
            $request, [
                'name'  =>  'required|string|max:200|unique:projets,name,'.$projet->id,
                'sigle' =>  'required|string|max:20|unique:projets,sigle,'.$projet->id,
                'debut' =>  'date',
                'fin'   =>  'date',
            ]
        );

        
        $projet->name   =   $request->input('name');
        $projet->sigle  =   $request->input('sigle');
        $projet->debut  =   $request->input('debut');
        $projet->fin    =   $request->input('fin');
        $projet->budjet =   $request->input('budjet');

        $projet->save();
        return redirect()->route('projets.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();
        $message = $projet->name.' a été supprimé(e)';
        return redirect()->route('projets.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $projets=Projet::get();
        return Datatables::of($projets)->make(true);
    }
}
