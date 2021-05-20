<?php

namespace App\Http\Controllers;

use App\Bordereau;
use App\Projet;
use App\Daf;
use Illuminate\Http\Request;

use Auth;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Courrier;
use App\Direction;
use App\Imputation;
use App\TypesCourrier;
use App\Charts\Courrierchart;

class BordereausController extends Controller
{
        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('roles:Administrateur|Gestionnaire|Daf');
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
        $bordereaus = Bordereau::all();
       
        return view('bordereaus.index',compact('date','courriers', 'bordereaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::distinct('name')->get()->pluck('sigle','id')->unique();
        //dd($projets);
        return view('bordereaus.create',compact('roles', 'projets'));
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
                'objet'         =>  'required|string|max:200',
                'expediteur'    =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'numero_mandat'         =>  'required',
                'date_mandat'           =>  'required|date_format:Y-m-d',
                'montant'               =>  'required',
                'nombre_de_piece'       =>  'required',
                'designation'           =>  'required',
                //'projet'                =>  'exists:projets,id',
            ]
        );

        
        $types_courrier_id = TypesCourrier::where('name','Courriers daf')->first()->id;
        $users_id  = Auth::user()->id;

        $bordereaus = new Bordereau([      
            'numero'                    =>     'B0'.$request->input('numero_mandat'),
            'numero_mandat'             =>      $request->input('numero_mandat'),  
            'date_mandat'               =>      $request->input('date_mandat'),    
            'montant'                   =>      $request->input('montant'),
            'nombre_de_piece'           =>      $request->input('nombre_de_piece'),
            'designation'               =>      $request->input('designation'),
            'observation'               =>      $request->input('observation'),
            'projets_id'                =>      $request->input('projet'),
            'dafs_id'                   =>      $request->input('projet')

        ]);
        $b = $request->input('numero_mandat');

        $bordereaus->save();

        $courriers = new Courrier([
            'numero'                    =>      'DA'.$request->input('numero_mandat'),
            'types_courriers_id'        =>      $types_courrier_id,
            'users_id'                  =>      $users_id,
            'objet'                     =>      $request->input('objet'),
            'message'                   =>      $request->input('message'),
            'expediteur'                =>      $request->input('expediteur'),
            'telephone'                 =>      $request->input('telephone'),
            'email'                     =>      $request->input('email')
        ]);

        $courriers->save();

        $courrier_id = Courrier::latest('id')->first()->id;
        
        $dafs = new Daf([
            'numero'                    =>      $request->input('numero_mandat'),
            'designation'               =>      $request->input('designation'),
            'observation'               =>      $request->input('observation'),
            'courriers_id'              =>      $courrier_id
        ]);

        $dafs->save();


        return redirect()->route('bordereaus.index')->with('success','bordereau ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bordereau  $bordereau
     * @return \Illuminate\Http\Response
     */
    public function show(Bordereau $bordereau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bordereau  $bordereau
     * @return \Illuminate\Http\Response
     */
    public function edit(Bordereau $bordereau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bordereau  $bordereau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bordereau $bordereau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bordereau  $bordereau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bordereau $bordereau)
    {
        $bordereau->daf->courrier->delete();
        $bordereau->daf->delete();
        $bordereau->delete();
        
        $message = 'Le courrier n° '.$bordereau->numero_mandat.' a été supprimé(e)';
        return back()->with(compact('message'));
    }
}
