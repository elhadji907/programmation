<?php

namespace App\Http\Controllers;

use App\Nivaux;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class NivauxsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nivauxs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivauxs.create');
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
               
                'name' =>  'required|string|max:50|unique:nivauxs,name',
            ]
        );
        $nivaux = new Nivaux([      
            'name'           =>      $request->input('name'),

        ]);
        
        $nivaux->save();
        return redirect()->route('nivauxs.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nivaux  $nivaux
     * @return \Illuminate\Http\Response
     */
    public function show(Nivaux $nivaux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nivaux  $nivaux
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivaux = Nivaux::find($id);
        return view('nivauxs.update', compact('nivaux','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nivaux  $nivaux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
        $this->validate(
            $request, 
            [
                'name' =>  'required|string|max:50'
            ]);   
        $nivaux = Nivaux::find($id);
        $nivaux->name  =   $request->input('name');
        $nivaux->save();
        return redirect()->route('nivauxs.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nivaux  $nivaux
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nivaux $nivaux)
    {
        $nivaux->delete();
        $message = $nivaux->name.' a été supprimé(e)';
        return redirect()->route('nivauxs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $nivauxs=Nivaux::get();
        return Datatables::of($nivauxs)->make(true);
    }
}
