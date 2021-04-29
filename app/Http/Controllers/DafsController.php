<?php

namespace App\Http\Controllers;

use App\Daf;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Courrier;
use App\Recue;
use App\Interne;
use App\Depart;
use App\Direction;
use App\Imputation;
use App\TypesCourrier;
use App\Charts\Courrierchart;

class DafsController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::today()->locale('fr_FR');
        $date = $date->copy()->addDays(0);
        $date = $date->isoFormat('LLLL');
        $dafs = Daf::all();
       
        return view('dafs.index',compact('date','courriers', 'dafs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypesCourrier::get();
        $numCourrier = date('YmdHis');

        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $directions = Direction::pluck('sigle','id');

        $imputations = Imputation::pluck('sigle','id');

        $date_r = Carbon::now();

       $chart      = Courrier::all();
       $chart = new Courrierchart;
       $chart->labels(['', '', '']);
       $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
           'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
       ]);

        return view('dafs.create',compact('date', 'types', 'directions','imputations', 'date_r', 'chart'));
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
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function show(Daf $daf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function edit(Daf $daf)
    {
        //$this->authorize('update', $daf->courrier);
        $directions = Direction::pluck('sigle','id');
        $imputations = Imputation::pluck('sigle','id');
        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);
         return view('dafs.update', compact('daf', 'directions', 'imputations', 'chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daf $daf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Daf  $daf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daf $daf)
    {
        //$this->authorize('delete',  $daf->courrier);
        $daf->courrier->imputations()->detach();
        $daf->courrier->delete();
        $daf->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$daf->numero.' a été supprimé';
        return redirect()->route('dafs.index')->with(compact('message'));
    }
    
    public function list(Request $request)
    {
        $dafs=Daf::with('courrier')->get();
        return Datatables::of($dafs)->make(true);
        
    }
}
