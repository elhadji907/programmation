<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Charts\Courrierchart;

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
        $courriers = Courrier::get()->count();

        $chart      = Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Départs', 'Arrivés', 'Internes']);
        $chart->dataset('STATISTIQUES', 'bar', [$internes, $recues, $departs])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        
        return view('courriers.index', compact('courriers', 'recues', 'internes', 'departs','chart'));
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
        $courriers = Courrier::get()->count();
        $demandes = \App\Demandeur::get()->count();


        return view('courriers.create', compact('courriers', 'recues', 'demandes', 'internes', 'departs'));
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
        $departs = $courrier->departs;
        $internes = $courrier->internes;
        $demandes = $courrier->demandeurs;
        if ($typescourrier == 'Courrier arrives') {            
        return view('recues.show', compact('recues','courrier'));

        } elseif($typescourrier == 'Courrier departs') {   
        return view('departs.show', compact('departs','courrier'));

        } elseif($typescourrier == 'Courrier internes') {    
            return view('internes.show', compact('internes','courrier'));

        } elseif($typescourrier == $typescourrier) {
            return view('demandeurs.show', compact('demandes','courrier'));
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
