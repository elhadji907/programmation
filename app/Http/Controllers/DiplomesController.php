<?php

namespace App\Http\Controllers;

use App\Diplome;
use App\Option;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DiplomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diplomes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $options = Option::get();
        return view('diplomes.create', compact('options'));
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
               
                'name'      =>  'required|string|max:50|unique:diplomes,name',
                'option'    =>  'required|string',
            ]
        );
        $option_id = $request->input('option');
        /*  dd($option_id); */
         $diplome = new Diplome([      
             'name'           =>      $request->input('name'),
             'options_id'     =>      $option_id
 
         ]);

         $diplome->save();
         return redirect()->route('diplomes.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function show(Diplome $diplome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diplomes = Diplome::find($id);
        $option = $diplomes->option;
        $options = option::get();
        /* dd("$options"); */
        return view('diplomes.update', compact('diplomes','options','option','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'name'      =>  'required|string|max:50',
                'option'    =>  'required|string'
            ]);   
        $diplome = Diplome::find($id);
        $diplome->name          =   $request->input('name');
        $diplome->options_id   =   $request->input('option');
        $diplome->save();
        return redirect()->route('diplomes.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diplome $diplome)
    {
        $diplome->delete();
        $message = $diplome->name.' a été supprimé(e)';
        return redirect()->route('diplomes.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $diplomes=Diplome::with('option')->get();
        return Datatables::of($diplomes)->make(true);
    }
}
