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
        // $this->authorize('update',  $bordereau->courrier);

        $directions = Direction::pluck('sigle','id');
        $projets = Projet::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $imputations = Imputation::pluck('sigle','id');

         return view('bordereaus.update', compact('bordereau', 'directions','imputations', 'projets'));
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

        
        $projet = $request->input('projet');
        $projets_id = Projet::where('sigle', $projet)->first()->id;

        //dd($projets_id);

       
        if (request('file')) { 
       $filePath = request('file')->store('bordereaus', 'public');
       $courrier = $bordereau->daf->courrier; 
       $daf = $bordereau->daf; 
       $types_courrier_id = TypesCourrier::where('name','Courriers daf')->first()->id;
       $user_id  = Auth::user()->id;

       $bordereau->numero                   =      $request->input('numero_mandat');
       $bordereau->numero_mandat            =      $request->input('numero_mandat');
       $bordereau->date_mandat              =      $request->input('date_mandat');
       $bordereau->montant                  =      $request->input('montant');
       $bordereau->nombre_de_piece          =      $request->input('nombre_de_piece');
       $bordereau->date_mandat              =      $request->input('date_mandat');
       $bordereau->montant                  =      $request->input('montant');
       $bordereau->nombre_de_piece          =      $request->input('nombre_de_piece');
       $bordereau->designation              =      $request->input('designation');
       $bordereau->observation              =      $request->input('observation');
       $bordereau->dafs_id                  =      $daf->id;

       $bordereau->save();

       $courrier->numero                    =      $request->input('numero_mandat');
       $courrier->objet                     =      $request->input('objet');
       $courrier->message                   =      $request->input('message');
       $courrier->expediteur                =      $request->input('expediteur');
       $courrier->email                     =      $request->input('email');
       $courrier->telephone                 =      $request->input('telephone');
       $courrier->types_courriers_id        =      $types_courrier_id;
       $courrier->users_id                  =      $user_id;
    
       $courrier->save();

      $daf->numero              =      $request->input('numero_mandat');
      $daf->designation         =      $request->input('designation');
      $daf->observation         =      $request->input('observation');
      $daf->projets_id          =      $projets_id;
      $daf->courriers_id        =      $courrier->id;

      $daf->save();
        }
        else{   

       $courrier = $bordereau->daf->courrier; 
       $daf = $bordereau->daf; 
       $types_courrier_id = TypesCourrier::where('name','Courriers daf')->first()->id;
       $user_id  = Auth::user()->id;

       $bordereau->numero                   =      $request->input('numero_mandat');
       $bordereau->numero_mandat            =      $request->input('numero_mandat');
       $bordereau->date_mandat              =      $request->input('date_mandat');
       $bordereau->montant                  =      $request->input('montant');
       $bordereau->nombre_de_piece          =      $request->input('nombre_de_piece');
       $bordereau->date_mandat              =      $request->input('date_mandat');
       $bordereau->montant                  =      $request->input('montant');
       $bordereau->nombre_de_piece          =      $request->input('nombre_de_piece');
       $bordereau->designation              =      $request->input('designation');
       $bordereau->observation              =      $request->input('observation');
       $bordereau->dafs_id                  =      $daf->id;

       $bordereau->save();
       
       $courrier->numero                    =      $request->input('numero_mandat');
       $courrier->objet                     =      $request->input('objet');
       $courrier->message                   =      $request->input('message');
       $courrier->expediteur                =      $request->input('expediteur');
       $courrier->email                     =      $request->input('email');
       $courrier->telephone                 =      $request->input('telephone');
       $courrier->types_courriers_id        =      $types_courrier_id;
       $courrier->users_id                  =      $user_id;
    
       $courrier->save();

      $daf->numero              =      $request->input('numero_mandat');
      $daf->designation         =      $request->input('designation');
      $daf->observation         =      $request->input('observation');
      $daf->projets_id          =      $projets_id;
      $daf->courriers_id        =      $courrier->id;

      $daf->save();
 

         }

       return redirect()->route('courriers.show', $bordereau->daf->courrier->id)->with('success','courrier modifié avec succès !');
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
