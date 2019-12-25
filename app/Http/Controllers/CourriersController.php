<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CourriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = \App\Courrier::get()->count();
        
        return view('courriers.index', compact('courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();       
        $courriers = \App\Courrier::get()->count();

        return view('courriers.create', compact('courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(Courrier $courrier)
    {
        $typescourrier = $courrier->types_courrier->name;
        /* dd($typescourrier); */

        $recues = $courrier->recues;
        $depart = $courrier->departs;
        $interne = $courrier->internes;
        $demande = $courrier->demandeurs;
        if ($typescourrier == 'Courrier arrives') {            
        return view('recues.show', compact('recues', 'courrier'));

        } elseif($typescourrier == 'Courrier departs') {    
        return view('departs.show', compact('depart'));

        } elseif($typescourrier == 'Courrier internes') {    
            return view('internes.show', compact('interne'));

        } elseif($typescourrier == $typescourrier) {
            return view('demandeurs.show', compact('demande'));
        } 
        else {
            return view('courriers.show', compact('courrier'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courrier $courrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courrier $courrier)
    {
        dd($courrier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courrier $courrier)
    {
        //
    }

    public function list(Request $request)
    {
        $courriers=Courrier::with('types_courrier')->get();
        return Datatables::of($courriers)->make(true);
    }
}
