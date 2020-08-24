<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('options.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('options.create');
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
               
                'name' =>  'required|string|max:50|unique:options,name',
            ]
        );
        $option = new Option([      
            'name'           =>      $request->input('name'),

        ]);
        
        $option->save();
        return redirect()->route('options.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        return view('options.update', compact('option','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
        $request, 
        [
            'name' =>  'required|string|max:50'
        ]);   
    $option = Option::find($id);
    $option->name  =   $request->input('name');
    $option->save();
    return redirect()->route('options.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        $message = $option->name.' a été supprimé(e)';
        return redirect()->route('options.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $options=Option::get();
        return Datatables::of($options)->make(true);
    }
}
