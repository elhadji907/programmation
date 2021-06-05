<?php

namespace App\Http\Controllers;

use App\Direction;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Charts\Courrierchart;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

       $directions = \App\Direction::all();

        return view('directions.index', compact('chart', 'directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $chart      = \App\Courrier::all();
       $chart = new Courrierchart;
       $chart->labels(['', '', '']);
       $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
           'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
       ]);

       
       $direction_id=$request->input('direction');
       $direction=\App\Direction::find($direction_id);

       //dd($direction_id);

        return view('directions.create',compact('user', 'chart','direction'));
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
                'input-direction'     => 'required|string|max:250',
                'input-sigle'         => 'required|string|max:10',
                'direction'           => 'required|exists:directions,id',
            ]
        );

        $direction = new Direction([            
            'name'      =>      $request->input('input-direction'),
            'sigle'     =>      $request->input('input-sigle'),
            'chef_id'   =>      $request->input('direction')

        ]);

        $direction->save();

        return redirect()->route('directions.index')->with('success','direction / service ajouté(e) avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directions = Direction::find($id);
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);        
        return view('directions.update', compact('directions','id','chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'direction'     => 'required|string|max:250',
                'sigle'         => 'required|string|max:10',
            ]);
            $direction = Direction::find($id);
            $direction->name   =     $request->input('direction');
            $direction->sigle  =     $request->input('sigle');

            $direction->save();
        
            return redirect()->route('directions.index')->with('success','direction modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        $message = $direction->sigle.' a été supprimé(e)';
        return redirect()->route('directions.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $directions=Direction::with('chef','employees')->get();
        return Datatables::of($directions)->make(true);

    }
}
