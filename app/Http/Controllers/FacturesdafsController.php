<?php

namespace App\Http\Controllers;

use App\Facturesdaf;
use Illuminate\Http\Request;

use Auth;

use App\Projet;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Courrier;
use App\Direction;
use App\Imputation;
use App\TypesCourrier;
use App\Charts\Courrierchart;

class FacturesdafsController extends Controller
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
        $facturesdafs = Facturesdaf::all();
       
        return view('facturesdafs.index',compact('date','courriers', 'facturesdafs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::distinct('name')->get()->pluck('sigle','id')->unique();
        $types = TypesCourrier::get();
        $numCourrier = date('YmdHis');
        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');
        $directions = Direction::pluck('sigle','id');
        $imputations = Imputation::pluck('sigle','id');
        $date_r = Carbon::now();

        return view('facturesdafs.create',compact('numCourrier', 'date', 'directions','imputations', 'date_r','projets','types','listes'));
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
                'date_imp'              =>  'required|date',
                'date_recep'            =>  'required|date',
                'date_cg'               =>  'required|date',
                'date_dg'               =>  'required|date',
                'date_ac'               =>  'required|date',
                'telephone'             =>  'required|string|max:50',
                'email'                 =>  'required|email|max:255',
                'numero_courrier'       =>  'required|unique:courriers,numero',
                'numero_mandat'         =>  'required|unique:bordereaus,numero',
                'montant'               =>  'required',
                'designation'           =>  'required'
            ]
        );

        $types_courrier_id = TypesCourrier::where('name','Factures daf')->first()->id;
        $user_id  = Auth::user()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = $courrier_id;

        $direction = \App\Direction::first();
        $imputation = \App\Imputation::first();
        $courrier = \App\Courrier::first();
      
        $montant            =    $request->input('montant');        
        $autres_montant     =    $request->input('autres_montant');        
        $tva_ir             =    $montant*(18/100);
        $total              =    $tva_ir + $montant + $autres_montant;

        $courrier = new Courrier([
            'numero'                    =>      $request->input('numero_courrier'),
            'objet'                     =>      $request->input('objet'),
            'designation'               =>      $request->input('designation'),
            'telephone'                 =>      $request->input('telephone'),
            'date_recep'                =>      $request->input('date_recep'),    
            'date_imp'                  =>      $request->input('date_imp'),       
            'montant'                   =>      $montant,
            'autres_montant'            =>      $autres_montant,
            'total'                     =>      $total,
            'email'                     =>      $request->input('email'),
            'tva_ir'                    =>      $tva_ir,
            'types_courriers_id'        =>      $types_courrier_id,
            'users_id'                  =>      $user_id,
        ]);

        $courrier->save();

        $facturesdafs = new Facturesdaf([      
            'numero'                    =>      $request->input('numero_mandat'),
            'date_recep'                =>      $request->input('date_recep'),    
            'date_transmission'         =>      $request->input('date_imp'),    
            'date_dg'                   =>      $request->input('date_dg'),    
            'date_cg'                   =>      $request->input('date_cg'),    
            'date_ac'                   =>      $request->input('date_ac'),       
            'montant'                   =>      $montant,
            'designation'               =>      $request->input('designation'),
            'observation'               =>      $request->input('observation'),
            'courriers_id'              =>      $courrier->id

        ]);

        $facturesdafs->save();

        /* $courrier->directions()->sync($request->imputations); */
        
        return redirect()->route('facturesdafs.index')->with('success','facture ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function show(Facturesdaf $facturesdaf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturesdaf $facturesdaf)
    {
        $this->authorize('update',  $facturesdaf->courrier);

        $directions = Direction::pluck('sigle','id');
        $imputations = Imputation::pluck('sigle','id');

         return view('facturesdafs.update', compact('facturesdaf', 'directions','imputations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturesdaf $facturesdaf)
    {
        $this->validate(
            $request, [
                'date_imp'              =>  'required|date',
                'date_recep'            =>  'required|date',
                'date_cg'               =>  'required|date',
                'date_dg'               =>  'required|date',
                'date_ac'               =>  'required|date',
                'telephone'             =>  'required|string|max:50',
                'email'                 =>  'required|email|max:255',
                'numero_courrier'       =>  'required|unique:courriers,numero,'.$facturesdaf->courrier->id,
                'numero_mandat'         =>  'required|unique:facturesdafs,numero,'.$facturesdaf->id,
                'montant'               =>  'required',
                'designation'           =>  'required'

            ]
        );

        $montant            =    $request->input('montant');        
        $autres_montant     =    $request->input('autres_montant');        
        $tva_ir             =    $montant*(18/100);
        $total              =    $tva_ir + $montant + $autres_montant;
        
    if (request('file')) { 
       $filePath = request('file')->store('facturesdafs', 'public');
       $courrier = $facturesdaf->courrier; 
       $types_courrier_id = TypesCourrier::where('name','Factures daf')->first()->id;
       $user_id  = Auth::user()->id;

       $courrier->numero                    =      $request->input('numero_mandat');
       $courrier->objet                     =      $request->input('objet');
       $courrier->email                     =      $request->input('email');
       $courrier->telephone                 =      $request->input('telephone');
       $courrier->date_recep                =      $request->input('date_recep');
       $courrier->date_imp                  =      $request->input('date_imp');
       $courrier->types_courriers_id        =      $types_courrier_id;
       $courrier->users_id                  =      $user_id;
       $courrier->file                      =      $filePath;
       $courrier->legende                   =      $request->input('legende');
       $courrier->adresse                   =      $request->input('adresse');
       $courrier->designation               =      $request->input('designation');
       $courrier->tva_ir                    =      $tva_ir;
       $courrier->montant                   =      $montant;
       $courrier->autres_montant            =      $autres_montant;
       $courrier->total                     =      $total;

    
       $courrier->save();

       $facturesdaf->numero                     =      $request->input('numero_courrier');
       $facturesdaf->date_recep                 =      $request->input('date_recep');
       $facturesdaf->date_transmission          =      $request->input('date_imp');
       $facturesdaf->date_dg                    =      $request->input('date_dg');
       $facturesdaf->date_cg                    =      $request->input('date_cg');
       $facturesdaf->date_ac                    =      $request->input('date_ac');
       $facturesdaf->montant                    =      $montant;
       $facturesdaf->designation                =      $request->input('designation');
       $facturesdaf->observation                =      $request->input('observation');
       $facturesdaf->courriers_id               =      $courrier->id; 

       $facturesdaf->save();
       
       $courrier->directions()->sync($request->input('directions'));

        }
    else{   
        $courrier = $facturesdaf->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Factures daf')->first()->id;
        $user_id  = Auth::user()->id;
 
        $courrier->numero                    =      $request->input('numero_mandat');
        $courrier->objet                     =      $request->input('objet');
        $courrier->email                     =      $request->input('email');
        $courrier->telephone                 =      $request->input('telephone');
        $courrier->adresse                   =      $request->input('adresse');
        $courrier->date_recep                =      $request->input('date_recep');
        $courrier->date_imp                  =      $request->input('date_imp');
        $courrier->designation               =      $request->input('designation');
        $courrier->types_courriers_id        =      $types_courrier_id;
        $courrier->users_id                  =      $user_id;
        $courrier->tva_ir                    =      $tva_ir;
        $courrier->montant                   =      $montant;
        $courrier->autres_montant            =      $autres_montant;
        $courrier->total                     =      $total;
 
     
        $courrier->save();
 
        $facturesdaf->numero                     =      $request->input('numero_mandat');
        $facturesdaf->date_recep                 =      $request->input('date_recep');
        $facturesdaf->date_transmission          =      $request->input('date_imp');
        $facturesdaf->date_dg                    =      $request->input('date_dg');
        $facturesdaf->date_cg                    =      $request->input('date_cg');
        $facturesdaf->date_ac                    =      $request->input('date_ac');
        $facturesdaf->montant                    =      $montant;
        $facturesdaf->designation                =      $request->input('designation');
        $facturesdaf->observation                =      $request->input('observation');
        $facturesdaf->courriers_id               =      $courrier->id; 
 
        $facturesdaf->save();
        
        $courrier->directions()->sync($request->input('directions'));

         }
         
       return redirect()->route('courriers.show', $facturesdaf->courrier->id)->with('success','courrier modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturesdaf $facturesdaf)
    {
        $facturesdaf->courrier->delete();
        $facturesdaf->delete();
                
        $message = 'La facture n° '.$facturesdaf->numero.' a été supprimé(e)';
        return redirect()->route('facturesdafs.index')->with(compact('message'));
    }
}
