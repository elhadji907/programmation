<?php

namespace App\Http\Controllers;

use App\Ingenieur;
use App\Formation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class IngenieursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingenieurs = Ingenieur::all();

        return view('ingenieurs.index', compact('ingenieurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingenieurs.create');
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
                'matricule'     =>  'required|string|min:3|max:5|unique:ingenieurs,matricule',
                'name'          =>  'required|string|max:100',
                'email'         =>  'required|email|max:255|unique:ingenieurs,email',
                'telephone'     =>  'required|string|max:255|unique:ingenieurs,email',
            ]
        );
        $ingenieur = new Ingenieur([      
            'matricule'           =>      $request->input('matricule'),
            'name'                =>      $request->input('name'),
            'email'               =>      $request->input('email'),
            'telephone'           =>      $request->input('telephone'),

        ]);
        
        $ingenieur->save();
        return redirect()->route('ingenieurs.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function show(Ingenieur $ingenieur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingenieur $ingenieur)
    {
        $id = $ingenieur->id;
        return view('ingenieurs.update', compact('ingenieur','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingenieur $ingenieur)
    {     
        $this->validate(
            $request, 
            [
                'matricule'     =>  'required|string|min:3|max:5|unique:ingenieurs,matricule,'.$ingenieur->id,
                'name'          =>  'required|string|max:100',
                'email'         =>  'required|email|max:255|unique:ingenieurs,email,'.$ingenieur->id,
                'telephone'     =>  'required|string|max:255|unique:ingenieurs,telephone,'.$ingenieur->id,
            ]);   

        $ingenieur->matricule  =   $request->input('matricule');
        $ingenieur->name  =   $request->input('name');
        $ingenieur->email  =   $request->input('email');
        $ingenieur->telephone  =   $request->input('telephone');
        $ingenieur->save();
        return redirect()->route('ingenieurs.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingenieur $ingenieur)
    {
        $ingenieur->delete();
        $message = $ingenieur->name.' a été supprimé(e)';
        return redirect()->route('ingenieurs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $ingenieurs=Ingenieur::withCount('formations')->get();
        return Datatables::of($ingenieurs)->make(true);
    }
}
