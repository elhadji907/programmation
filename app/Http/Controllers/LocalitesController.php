<?php

namespace App\Http\Controllers;

use App\Localite;
use App\Module;
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
        $localites = Localite::with('demandeurs.localite')->get();
        $modules = Module::with('demandeurs.modules','demandeurs.localite')->get();
        /* dd($localites); */
        return view('localites.index', compact('localites','modules'));
    }

    public function pdcej()
    {
        $localites = Localite::with('demandeurs.localite')->get();
        $modules = Module::with('demandeurs.modules','demandeurs.localite')->get();
        /* dd($localites); */
        return view('localites.detail', compact('localites','modules'));
    }

    public function lister($localitesliste, $nom_module)
    {
        $localites = Localite::with('demandeurs.localite')->get();
        $modules = Module::with('demandeurs.modules','demandeurs.localite')->get();
        return view('localites.lister', compact('localites','modules','localitesliste','nom_module'));
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
       /*  $localites = $localite; */
        $localites = Localite::with('demandeurs.localite')->get();
        $id        = $localite->id;
        $lieu = $localite->name;
        
       /*  dd($lieu); */

       return view('demandeurs.lieu', compact('localites','id','lieu'));

  /*       if ($localite->name == "Dakar") {
            return view('demandeurs.lieu', compact('localites','id','lieu'));
        } elseif($localite->name == "Ziguinchor") {
            return view('demandeurs.ziguinchor', compact('localites','id'));
        }
        elseif($localite->name == "Kaolack") {
            return view('demandeurs.kaolack', compact('localites','id'));
        }
        elseif($localite->name == "Saint-Louis") {
            return view('demandeurs.saintlouis', compact('localites','id'));
        }else{
            return view('localites.index', compact('localites','id'));
        } */
        
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
        return back()->with(compact('message'));
    }

    public function list(Request $request)
    {
        $localites=Localite::with('demandeurs')->get();
        return Datatables::of($localites)->make(true);
    }
}
