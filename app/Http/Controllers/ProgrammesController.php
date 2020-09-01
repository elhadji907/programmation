<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProgrammesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('programmes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programmes.create');
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
                'name'      =>  'required|string|unique:programmes,name',
                'sigle'     =>  'required|string|unique:programmes,sigle',
                'effectif'  =>  'required|string',
            ]
        );
        $programme = new Programme([      
            'name'           =>      $request->input('name'),
            'sigle'          =>      $request->input('sigle'),
            'effectif'       =>      $request->input('effectif'),

        ]);
        
        $programme->save();
        return redirect()->route('programmes.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programme = Programme::find($id);
        return view('programmes.update', compact('programme','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $programme = Programme::find($id);

        $this->validate(
            $request, 
            [
                'name'      =>  'required|string|unique:programmes,name,'.$programme->id,
                'sigle'     =>  'required|string|unique:programmes,sigle,'.$programme->id,
                'effectif'  =>  'required|string',
            ]);   
        $programme              = Programme::find($id);
        $programme->name        =   $request->input('name');
        $programme->sigle       =   $request->input('sigle');
        $programme->effectif    =   $request->input('effectif');

        $programme->save();
        return redirect()->route('programmes.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        $message = $programme->sigle.' a été supprimé(e)';
        return redirect()->route('programmes.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $programmes=Programme::get();
        return Datatables::of($programmes)->make(true);
    }
}
