<?php

namespace App\Http\Controllers;

use App\Ninea;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class NineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nineas = Ninea::get();

        /* dd($nineas); */

        return view('nineas.index', compact('nineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nineas.create');
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
                'numero'        =>  'required|string|max:50|unique:nineas,numero',
                'name'          =>  'required|string'
            ]
        );

        
        $ninea = new Ninea([      
            'numero'           =>      $request->input('numero'),
            'name'             =>     $request->input('name')

        ]);
       
        $ninea->save();
        return redirect()->route('nineas.index')->with('success','enregistrement effectué avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ninea  $ninea
     * @return \Illuminate\Http\Response
     */
    public function show(Ninea $ninea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ninea  $ninea
     * @return \Illuminate\Http\Response
     */
    public function edit(Ninea $ninea)
    {
        return view('nineas.update', compact('ninea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ninea  $ninea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ninea $ninea)
    {
        $this->validate(
            $request, [
                'numero'        =>  'required|string|max:50|unique:nineas,numero,'.$ninea->id,
                'name'          =>  'required|string'
            ]
        );
        
        $ninea->numero          =   $request->input('numero');
        $ninea->name            =   $request->input('name');

        $ninea->save();
        return redirect()->route('nineas.index')->with('success','enregistrement modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ninea  $ninea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ninea $ninea)
    { 
        $ninea->delete();
        $message = $ninea->numero.' a été supprimé(e)';
        return redirect()->route('nineas.index')->with(compact('message'));
    }
    public function list(Request $request)
    {
        $nineas=Ninea::with('operateur')->get();
        return Datatables::of($nineas)->make(true);
    }
}
