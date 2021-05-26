<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Charts\Courrierchart;
use Illuminate\Notifications\DatabaseNotification;

class CourriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Gestionnaire|Courrier');
    }
    public function index()
    {

        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $bordereaus = \App\Bordereau::get()->count();

        $courrier = Courrier::get()->count();
        
        $courriers = Courrier::all();

        $chart      = Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Courriers départs', 'Courriers arrivés', 'Courriers internes']);
        $chart->dataset('STATISTIQUES', 'bar', [$internes, $recues, $departs])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        
        return view('courriers.index', compact('courriers','courrier', 'recues', 'internes', 'departs','chart', 'bordereaus'));
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
        $bordereaus = \App\Bordereau::get()->count();


        return view('courriers.create', compact('courriers', 'recues', 'demandes', 'internes', 'departs', 'bordereaus'));
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
       // dd($typescourrier); 

        $recues = $courrier->recues;
        $departs = $courrier->departs;
        $internes = $courrier->internes;
        $bordereaus = $courrier->bordereaus;
        
        $recue = \App\Recue::get()->count();
        $interne = \App\Interne::get()->count();
        $depart = \App\Depart::get()->count();
        $courrier = Courrier::get()->count();
        $bordereau = \App\Bordereau::get()->count();

        $chart      = Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Départs', 'Arrivés', 'Internes']);
        $chart->dataset('STATISTIQUES', 'bar', [$interne, $recue, $depart])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        if ($typescourrier == 'Courriers arrives') {            
        return view('recues.show', compact('recues','courrier','chart'));

        } elseif($typescourrier == 'Courriers departs') {   
        return view('departs.show', compact('departs','courrier','chart'));

        } elseif($typescourrier == 'Courriers internes') {    
            return view('internes.show', compact('internes','courrier','chart'));

        } elseif($typescourrier == 'Bordereau') {    
            return view('bordereaus.show', compact('bordereaus','courrier','chart'));

        }  elseif($typescourrier == 'Tresor') {    
            return view('tresors.show', compact('tresors','courrier','chart'));

        } else {
            return view('courriers.show', compact('courrier','chart'));
        }
        
    }


    public function showFromNotification(Courrier $courrier, DatabaseNotification $notification){

        $notification->markAsRead();
        
        $typescourrier = $courrier->types_courrier->name;
        $recues = $courrier->recues;
        $departs = $courrier->departs;
        $internes = $courrier->internes;
        $bordereaus = $courrier->bordereaus;
        // $demandes = $courrier->demandeurs;
        
        $recue = \App\Recue::get()->count();
        $interne = \App\Interne::get()->count();
        $depart = \App\Depart::get()->count();
        $courrier = Courrier::get()->count();
        $bordereau = \App\Bordereau::get()->count();

        $chart      = Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Départs', 'Arrivés', 'Internes']);
        $chart->dataset('STATISTIQUES', 'bar', [$interne, $recue, $depart])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
        // dd($typescourrier);
        if ($typescourrier == 'Courriers arrives') {            
            return view('recues.show', compact('recues','courrier','chart'));
    
            } elseif($typescourrier == 'Courriers departs') {   
            return view('departs.show', compact('departs','courrier','chart'));
    
            } elseif($typescourrier == 'Courriers internes') {    
                return view('internes.show', compact('internes','courrier','chart'));
    
            }  elseif($typescourrier == 'Bordereau') {    
                return view('bordereaus.show', compact('bordereaus','courrier','chart'));
    
            }  elseif($typescourrier == 'Tresor') {    
                return view('tresors.show', compact('tresors','courrier','chart'));
    
            }else {
                return view('courriers.show', compact('courrier','chart'));
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
    //    dd($courrier);
    $typescourrier = $courrier->types_courrier->name;
    //dd($typescourrier);

    $recues = $courrier->recues;
    $departs = $courrier->departs;
    $internes = $courrier->internes;
    $bordereaus = $courrier->bordereaus;
    
    $recue = \App\Recue::get()->count();
    $interne = \App\Interne::get()->count();
    $depart = \App\Depart::get()->count();
    $courrier = Courrier::get()->count();
    $bordereau = \App\Bordereau::get()->count();

    $chart      = Courrier::all();

    $chart = new Courrierchart;
    $chart->labels(['Départs', 'Arrivés', 'Internes']);
    $chart->dataset('STATISTIQUES', 'bar', [$interne, $recue, $depart])->options([
        'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
    ]);

    if ($typescourrier == 'Courriers arrives') {            
    return view('recues.details', compact('recues','courrier','chart'));

    } elseif($typescourrier == 'Courriers departs') {   
    return view('departs.details', compact('departs','courrier','chart'));

    } elseif($typescourrier == 'Courriers internes') {    
        return view('internes.details', compact('internes','courrier','chart'));

    }  elseif($typescourrier == 'Bordereau') {    
        return view('bordereaus.details', compact('bordereaus','courrier','chart'));

    }  elseif($typescourrier == 'Tresor') {    
        return view('tresors.details', compact('tresors','courrier','chart'));

    }else {
        return view('courriers.details', compact('courrier','chart'));
    }
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
        $this->authorize('update', $courrier);
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
