<?php

namespace App\Http\Controllers;

use App\Demandeur;
use App\Role;
use App\Objet;
use App\User;
use App\Courrier;
use App\Nivaux;
use App\Typedemande;
use App\Programme;
use Auth;
use App\Module;
use App\Localite;
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Charts\Courrierchart;

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
        $roles = Role::get();
        /* $civilites = User::select('civilite')->distinct()->get(); */
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
        $niveaux = Nivaux::distinct('name')->get()->pluck('name','name')->unique();
        $objets = Objet::distinct('name')->get()->pluck('name','id')->unique();
        $types_demandes = Typedemande::distinct('name')->get()->pluck('name','id')->unique();
        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $localites = Localite::distinct('name')->get()->pluck('name','id')->unique();
      
        return view('demandeurs.create',compact('roles', 'localites', 'civilites','niveaux', 'objets', 'types_demandes','modules','programmes'));

      /*   $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');
            
        $roles = Role::get();
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
        $niveaux = Nivaux::distinct('name')->get()->pluck('name','name')->unique();
        $objets = Objet::select('name')->distinct()->get();

        return view('demandeurs.create',compact('date', 'roles', 'civilites', 'objets', 'niveaux','chart')); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     /*   $modules =  $request->modules;

       dd($modules); */

        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:50',
                'civilite'      =>  'required|string|max:10',
                'cin'           =>  'required|string|min:12|max:18|unique:demandeurs,cin',
                'prenom'        =>  'required|string|max:50',
                'nom'           =>  'required|string|max:50',
                'date_naiss'     =>  'required|date|max:50',
                'lieu'          =>  'required|string|max:50',
                'telephone'    =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'numero_courrier'           =>  'required|string|unique:demandeurs,numero_courrier',
            ],
            [
                'password.min'  =>  'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'  =>  'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );

        $roles_id = Role::where('name','Demandeur')->first()->id;
        
        $user_id = User::latest('id')->first()->id;
        $username   =   strtolower($request->input('nom').$user_id);

       /*  dd($username); */

        $utilisateur = new User([      
            'civilite'       =>      $request->input('civilite'),      
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'username'       =>      $username,
            'telephone'      =>      $request->input('telephone'),
            'date_naissance' =>      $request->input('date_naiss'),
            'lieu_naissance' =>      $request->input('lieu'),
            'password'       =>      Hash::make($request->input('email')),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();
       /*  
        $letter1 = chr(rand(65,90));
       
        $matricule = $letter5.$letter6.$annee.$letter1.$letter2.'/'.$letter3.$letter4; */
        
       /*  $matricule = date('YmdHis');

        dd($matricule); */

        // dd($matricule);

        /* $objets_id = Objet::where('name',$request->input('objet'))->first()->id; */

        $matricule = 'FP'.date('ymdHis');
        $letter1 = chr(rand(65,90));
        $matricule = $matricule.$letter1;
        // dd($matricule);

        $demandeurs = new Demandeur([
            'cin'               =>     $request->input('cin'),
            'numero_courrier'   =>     $request->input('numero_courrier'),
            'matricule'         =>     $matricule,
            'users_id'          =>     $utilisateur->id,
            'typedemandes_id'   =>     $request->input('type_demande'),
            'objets_id'         =>     $request->input('objet')
        ]);

        $demandeurs->save();

        $demandeurs->modules()->sync($request->modules);

       /*  if ( Auth::user()->role()->first()->name == 'Demandeur' ){
            return redirect()->route('demandeurs.index')->with('success','demandeur ajoutée avec succès !');
        }
        else{
            return redirect()->route('beneficiaires.create')->with('success','bienvenue, merci de compléter votre demande !');
        } */
        return redirect()->route('demandeurs.index')->with('success','demandeur ajoutée avec succès !');
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

        return view('demandeurs.update', compact('demandeur', 'utilisateur', 'id', 'roles', 'civilites', 'objets', 'date', 'chart'));
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
       
        $demandeur->user->delete();
        $demandeur->delete();
        
        $message = $demandeur->user->firstname.' '.$demandeur->user->name.' a été supprimé(e)';
        return redirect()->route('demandeurs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $demandeurs = Demandeur::with('user.demandeur.modules')->orderBy('created_at', 'desc')->get();
        return Datatables::of($demandeurs)->make(true);

    }
}