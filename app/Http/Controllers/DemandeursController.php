<?php

namespace App\Http\Controllers;

use App\Demandeur;
use App\Role;
use App\Objet;
use App\User;
use App\Courrier;
use App\Nivaux;
use Auth;

use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DemandeursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('demandeurs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $roles = Role::get();
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
        $niveaux = Nivaux::distinct('name')->get()->pluck('name','name')->unique();
        $objets = Objet::select('name')->distinct()->get();

        // dd($objets);
        return view('demandeurs.create',compact('date', 'roles', 'civilites', 'objets', 'niveaux'));
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
                'objet'         =>  'required|string|max:50',
                'civilite'      =>  'required|string|max:10',
                'cin'           =>  'required|string|min:12|max:18|unique:demandeurs,cin',
                'prenom'        =>  'required|string|max:50',
                'nom'           =>  'required|string|max:50',
                'date_nais'     =>  'required|date|max:50',
                'lieu'          =>  'required|string|max:50',
                'telephone1'    =>  'required|string|max:50',
                'telephone2'    =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'username'      =>  'required|string|min:8|unique:users,username',
                'password'      =>  'required|confirmed|string|min:8|max:50',
            ],
            [
                'password.min'  =>  'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'  =>  'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );

        $types_courrier_id = \App\TypesCourrier::where('name','Demande')->first()->id;
        $type_demande_id = \App\Typedemande::where('name','Individuelle')->first()->id;
        $gestionnaire_id  = Auth::user()->gestionnaire()->first()->id;
        $annee = 'FP'.date('ymdHis');
        $direction = \App\Direction::first();
        $courrier = Courrier::first();
        
        $courrier_id =  Courrier::get()->last()->id;

        $longueur = strlen($courrier_id);

        if ($longueur <= '1' ) {
            $numero_courrier  = "000".$courrier_id;
        }
        elseif($longueur <= '2'){
            $numero_courrier  = "00".$courrier_id;

        }elseif($longueur <= '3') {
             $numero_courrier  = "0".$courrier_id;

        }else {
            $numero_courrier  = $courrier_id;
        }
       
        // $filePath = request('file')->store('demandes', 'public');
        $courrier = new Courrier([
            'numero'             =>      "FP-".$annee."-".$numero_courrier,
            'objet'              =>      $request->input('objet'),
            'expediteur'         =>      $request->input('prenom').' '.$request->input('nom'),
            'telephone'          =>      $request->input('telephone1'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'date'               =>      $request->input('date_r'),
            'legende'            =>      $request->input('legende'),
            'types_courriers_id' =>      $types_courrier_id,
            'gestionnaires_id'   =>      $gestionnaire_id,
            // 'file'               =>      $filePath
        ]);        

        $courrier->save();

        $roles_id = Role::where('name','Demandeur')->first()->id;

        $utilisateur = new User([      
            'civilite'       =>      $request->input('civilite'),      
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'username'       =>      $request->input('username'),
            'telephone'      =>      $request->input('telephone1'),
            'password'       =>      Hash::make($request->input('password')),
            'roles_id'       =>      $roles_id,
            'directions_id'  =>      $gestionnaire_id

        ]);
        
        $utilisateur->save();
       /*  
        $letter1 = chr(rand(65,90));
       
        $matricule = $letter5.$letter6.$annee.$letter1.$letter2.'/'.$letter3.$letter4; */
        
       /*  $matricule = date('YmdHis');

        dd($matricule); */

        // dd($matricule);

        $objets_id = Objet::where('name',$request->input('objet'))->first()->id;
        /* dd($objets_id); */

        $matricule = 'FP'.date('ymdHis');
        $letter1 = chr(rand(65,90));
        $matricule = $matricule.$letter1;
        // dd($matricule);

        $demandeurs = new Demandeur([
            'cin'               =>     $request->input('cin'),
            'matricule'         =>     $matricule,
            'users_id'          =>     $utilisateur->id,
            'courriers_id'      =>     $courrier_id,
            'typedemandes_id'   =>     $type_demande_id,
            'objets_id'         =>     $objets_id
        ]);

        $demandeurs->save();

        if ( Auth::user()->role()->first()->name == 'Demandeur' ){
            return redirect()->route('demandeurs.index')->with('success','demandeur ajoutée avec succès !');
        }
        else{
            return redirect()->route('beneficiaires.create')->with('success','bienvenue, merci de compléter votre demande !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function show(Demandeur $demandeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demandeur = Demandeur::find($id);
        $utilisateur=$demandeur->user;      
          /* dd($utilisateur); */
          $date = Carbon::parse('now');
          $date = $date->format('Y-m-d');
  
          $roles = Role::get();
          $civilites = User::select('civilite')->distinct()->get();
          $objets = Objet::select('name')->distinct()->get();
  
       /*  dd($objets); */
        //return $utilisateur;
        return view('demandeurs.update', compact('demandeur', 'utilisateur', 'id', 'roles', 'civilites', 'objets', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demandeur $demandeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demandeur $demandeur)
    {
        //
    }

    public function list(Request $request)
    {
        $demandeurs = Demandeur::with('user','courrier')->orderBy('created_at', 'desc')->get();
        return Datatables::of($demandeurs)->make(true);
    }
}