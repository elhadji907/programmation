<?php

namespace App\Http\Controllers;

use App\Tresor;
use Illuminate\Http\Request;


use Auth;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Courrier;
use App\Direction;
use App\Imputation;
use App\TypesCourrier;
use App\Charts\Courrierchart;

class TresorsController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('roles:Administrateur|Gestionnaire');
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
        $tresors = Tresor::all();
       
        return view('tresors.index',compact('date','courriers', 'tresors'));
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

        return view('tresors.create',compact('numCourrier', 'date', 'directions','imputations', 'date_r','types'));
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
            ]
        );

        
        $types_courrier_id = TypesCourrier::where('name','tresor')->first()->id;
        $user_id  = Auth::user()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = $courrier_id;

        $direction = \App\Direction::first();
        $imputation = \App\Imputation::first();
        $courrier = \App\Courrier::first();

        $courrier = new Courrier([
            'numero'                    =>      'DA'.$request->input('numero_mandat'),
            'objet'                     =>      $request->input('objet'),
            'message'                   =>      $request->input('message'),
            'expediteur'                =>      $request->input('expediteur'),
            'telephone'                 =>      $request->input('telephone'),
            'email'                     =>      $request->input('email'),
            'projets_id'                =>      $request->input('projet'),
            'types_courriers_id'        =>      $types_courrier_id,
            'users_id'                  =>      $user_id,
        ]);

        
        $courrier->save();

        $tresors = new Tresor([      
            'numero'                    =>     'TR'.$request->input('numero_mandat'),
            'numero_mandat'             =>      $request->input('numero_mandat'),  
            'date_mandat'               =>      $request->input('date_mandat'),    
            'montant'                   =>      $request->input('montant'),
            'nombre_de_piece'           =>      $request->input('nombre_de_piece'),
            'designation'               =>      $request->input('designation'),
            'observation'               =>      $request->input('observation'),
            'courriers_id'              =>      $courrier->id

        ]);

        $tresors->save();

        $courrier->directions()->sync($request->imputations);
        
        return redirect()->route('tresors.index')->with('success','tresor ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tresor  $tresor
     * @return \Illuminate\Http\Response
     */
    public function show(Tresor $tresor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tresor  $tresor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tresor $tresor)
    {
        $this->authorize('update',  $tresor->courrier);

        $directions = Direction::pluck('sigle','id');
        $imputations = Imputation::pluck('sigle','id');

         return view('tresors.update', compact('tresor', 'directions','imputations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tresor  $tresor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tresor $tresor)
    {
        
        $this->validate(
            $request, [
                'objet'                 =>  'required|string|max:200',
                'expediteur'            =>  'required|string|max:100',
                'telephone'             =>  'required|string|max:50',
                'email'                 =>  'required|email|max:255',
                'numero_mandat'         =>  'required',
                'date_mandat'           =>  'required|date_format:Y-m-d',
                'montant'               =>  'required',
                'nombre_de_piece'       =>  'required',
                'designation'           =>  'required',

            ]
        );
        
    if (request('file')) { 
       $filePath = request('file')->store('tresors', 'public');
       $courrier = $tresor->courrier; 
       $types_courrier_id = TypesCourrier::where('name','Tresor')->first()->id;
       $user_id  = Auth::user()->id;

       $courrier->numero                    =      $request->input('numero_mandat');
       $courrier->objet                     =      $request->input('objet');
       $courrier->message                   =      $request->input('message');
       $courrier->expediteur                =      $request->input('expediteur');
       $courrier->email                     =      $request->input('email');
       $courrier->telephone                 =      $request->input('telephone');
       $courrier->types_courriers_id        =      $types_courrier_id;
       $courrier->users_id                  =      $user_id;
       $courrier->file                      =      $filePath;
       $courrier->legende                   =      $request->input('legende');
    
       $courrier->save();

       $tresor->numero                   =      $request->input('numero_mandat');
       $tresor->numero_mandat            =      $request->input('numero_mandat');
       $tresor->date_mandat              =      $request->input('date_mandat');
       $tresor->montant                  =      $request->input('montant');
       $tresor->nombre_de_piece          =      $request->input('nombre_de_piece');
       $tresor->date_mandat              =      $request->input('date_mandat');
       $tresor->montant                  =      $request->input('montant');
       $tresor->nombre_de_piece          =      $request->input('nombre_de_piece');
       $tresor->designation              =      $request->input('designation');
       $tresor->observation              =      $request->input('observation');
       $tresor->courriers_id             =      $courrier->id;

       $tresor->save();

        }
    else{   
        $courrier = $tresor->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Tresor')->first()->id;
        $user_id  = Auth::user()->id;

       $courrier->numero                    =      $request->input('numero_mandat');
       $courrier->objet                     =      $request->input('objet');
       $courrier->message                   =      $request->input('message');
       $courrier->expediteur                =      $request->input('expediteur');
       $courrier->email                     =      $request->input('email');
       $courrier->telephone                 =      $request->input('telephone');
       $courrier->types_courriers_id        =      $types_courrier_id;
       $courrier->users_id                  =      $user_id;
    
       $courrier->save();

       $tresor->numero                   =      $request->input('numero_mandat');
       $tresor->numero_mandat            =      $request->input('numero_mandat');
       $tresor->date_mandat              =      $request->input('date_mandat');
       $tresor->montant                  =      $request->input('montant');
       $tresor->nombre_de_piece          =      $request->input('nombre_de_piece');
       $tresor->date_mandat              =      $request->input('date_mandat');
       $tresor->montant                  =      $request->input('montant');
       $tresor->nombre_de_piece          =      $request->input('nombre_de_piece');
       $tresor->designation              =      $request->input('designation');
       $tresor->observation              =      $request->input('observation');
       $tresor->courriers_id             =      $courrier->id; 

       $tresor->save();

         }

       return redirect()->route('courriers.show', $tresor->courrier->id)->with('success','courrier modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tresor  $tresor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tresor $tresor)
    {
        $tresor->courrier->delete();
        $tresor->delete();
                
        $message = 'Le courrier n° '.$tresor->numero.' a été supprimé(e)';
        return redirect()->route('tresors.index')->with(compact('message'));
    }
}
