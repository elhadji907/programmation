<?php

namespace App\Http\Controllers;

use App\Depense;
use App\Projet;
use App\Activite;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DepensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depenses = Depense::all();

        return view('depenses.index', compact('depenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::distinct('name')->get()->pluck('sigle','id')->unique();
        $activites = Activite::distinct('name')->get()->pluck('name','id')->unique();

        return view('depenses.create',compact('projets','activites'));
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
                'montant'               =>  'required|string',
                'projet'                =>  'required|string',
                'activite'              =>  'required|string',
                'fournisseur'           =>  'required|string',
                'designation'           =>  'required|string',
            ]
        );

        $montant            =    $request->input('montant');
        $autre_montant     =    $request->input('autres_montant');     
        $ir                 =    $request->input('ir');    
        $tva                =    $montant*(18/100);
        $total              =    $tva + $montant + $autre_montant + $ir;

        
        $numero = Depense::get()->last()->id;

        $depense = new Depense([       
            'numero'                    =>      $numero,
            'montant'                   =>      $montant,
            'autre_montant'             =>      $autre_montant,  
            'ir'                        =>      $ir,   
            'tva'                       =>      $tva,   
            'total'                     =>      $total,   
            'fournisseurs'              =>      $request->input('fournisseur'),
            'designation'               =>      $request->input('designation'),
            'projets_id'                =>      $request->input('projet'),
            'activites_id'              =>      $request->input('activite')

        ]);

        $depense->save();
        
        return redirect()->route('depenses.index')->with('success','dépense ajoutée avec succès !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {       
        $projets = Projet::distinct('name')->get()->pluck('name','name')->unique();
        $sigles = Projet::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $activites = Activite::distinct('name')->get()->pluck('name','name')->unique();
        /* dd("$secteurs"); */
        return view('depenses.update', compact('depense','activites','projets','sigles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {
        $this->validate(
            $request, 
            [
                'designation'       =>  'required|string',
                'fournisseur'       =>  'required|string',
                'montant'           =>  'required|string',
                'activite'          =>  'required|string',
                'projet'            =>  'required|string'

            ]);   

        $projet     = $request->input('projet');
        $activite   = $request->input('activite');

        
        $montant            =    $request->input('montant');
        $autre_montant     =    $request->input('autres_montant');     
        $ir                 =    $request->input('ir');    
        $tva                =    $montant*(18/100);
        $total              =    $tva + $montant + $autre_montant + $ir;

        $projet_id = Projet::where('name',$projet)->first()->id;
        $activite_id = Activite::where('name',$activite)->first()->id;

        
        $depense->designation           =   $request->input('designation');
        $depense->fournisseurs          =   $request->input('fournisseur');
        $depense->montant               =   $montant;
        $depense->tva                   =   $tva;
        $depense->ir                    =   $ir;
        $depense->autre_montant         =   $autre_montant;
        $depense->total                 =   $total;
        $depense->activites_id          =   $activite_id;
        $depense->projets_id            =   $projet_id;

        $depense->save();

        return redirect()->route('depenses.index')->with('success','enregistrement modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
