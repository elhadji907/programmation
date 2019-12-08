<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Domaine;
use App\Secteur;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secteurs = Secteur::get();
        $domaines = Domaine::get();
        return view('modules.create', compact('secteurs','domaines'));
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
               
                'module'      =>  'required|string|max:50|unique:modules,name',
                'domaine'      =>  'required|string'
            ]
        );
        $domaine_id = $request->input('domaine');
     
       /*  dd($domaine_id); */
        $domaine = new Module([      
            'name'           =>      $request->input('module'),
            'domaines_id'    =>      $domaine_id

        ]);


        
        $domaine->save();
        return redirect()->route('modules.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Module::find($id);
        $domaine = $modules->domaine;
        $domaines = Domaine::get();
        /* dd("$secteurs"); */
        return view('modules.update', compact('modules','domaine','domaines','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'name'      =>  'required|string|max:50',
                'domaine'   =>  'required|string'
            ]);   
        $module = Module::find($id);
        $module->name          =   $request->input('name');
        $module->domaines_id   =   $request->input('domaine');
        $module->save();
        return redirect()->route('modules.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        $message = $module->name.' a été supprimé(e)';
        return redirect()->route('modules.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $modules=Module::with('domaine.secteur')->get();
        return Datatables::of($modules)->make(true);
    }
}
