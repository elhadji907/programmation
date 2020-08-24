<?php

namespace App\Http\Controllers;

use App\Demandeur;
use App\Diplome;
use App\Role;
use App\Objet;
use App\User;
use App\Courrier;
use App\Departement;
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
        $ziguinchor = Demandeur::with('user.demandeur.localite')
        ->get()->where('user.demandeur.localite.name','Ziguinchor')
        ->pluck('user.demandeur.localite.name','id')->count();

        $dakar = Demandeur::with('user.demandeur.localite')
        ->get()->where('user.demandeur.localite.name','Dakar')
        ->pluck('user.demandeur.localite.name','id')->count();

        $kaolack = Demandeur::with('user.demandeur.localite')
        ->get()->where('user.demandeur.localite.name','Kaolack')
        ->pluck('user.demandeur.localite.name','id')->count();

        $saintlouis = Demandeur::with('user.demandeur.localite')
        ->get()->where('user.demandeur.localite.name','Saint-Louis')
        ->pluck('user.demandeur.localite.name','id')->count();

        $total = $ziguinchor+$dakar+$saintlouis+$kaolack;

        return view('demandeurs.index', compact('ziguinchor','dakar','saintlouis','kaolack','total'));
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
        $niveaux = Nivaux::distinct('name')->get()->pluck('name','id')->unique();
        $objets = Objet::distinct('name')->get()->pluck('name','id')->unique();
        $types_demandes = Typedemande::distinct('name')->get()->pluck('name','id')->unique();
        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $localites = Localite::distinct('name')->get()->pluck('name','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
      
        return view('demandeurs.create',compact('roles', 'demandeurs', 'departements', 'diplomes', 'localites', 'civilites','niveaux', 'objets', 'types_demandes','modules','programmes'));

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
                'objet'               =>  'required|string|max:50',
                'civilite'            =>  'required|string|max:10',
                'cin'                 =>  'required|string|min:12|max:18|unique:demandeurs,cin',
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'date_naiss'          =>  'required|date|max:50',
                'date_depot'          =>  'required|date|max:50',
                'lieu'                =>  'required|string|max:50',
                'telephone'           =>  'required|string|max:50',
                'email'               =>  'required|email|max:255|unique:users,email',
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier',
                'localite'            =>  'required',
                'type_demande'        =>  'required',
                'programme'           =>  'required',
                'niveaux'             =>  'required',
                'diplomes'            =>  'required',
                'modules'             =>  'required',
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
            'civilite'                  =>      $request->input('civilite'),      
            'firstname'                 =>      $request->input('prenom'),
            'name'                      =>      $request->input('nom'),
            'email'                     =>      $request->input('email'),
            'username'                  =>      $username,
            'telephone'                 =>      $request->input('telephone'),
            'situation_familiale'       =>      $request->input('familiale'),
            'situation_professionnelle' =>      $request->input('professionnelle'),
            'date_naissance'            =>      $request->input('date_naiss'),
            'lieu_naissance'            =>      $request->input('lieu'),
            'adresse'                   =>      $request->input('adresse'),
            'password'                  =>      Hash::make($request->input('email')),
            'roles_id'                  =>      $roles_id

        ]);
        
        $utilisateur->save();

        $demandeurs = new Demandeur([
            'cin'               =>     $request->input('cin'),
            'numero_courrier'   =>     $request->input('numero_courrier'),
            'date_depot'        =>     $request->input('date_depot'),
            'experience'        =>     $request->input('experience'),
            'projet'            =>     $request->input('projet'),
            'information'       =>     $request->input('information'),
            'users_id'          =>     $utilisateur->id,
            'typedemandes_id'   =>     $request->input('type_demande'),
            'objets_id'         =>     $request->input('objet'),
            'localites_id'      =>     $request->input('localite'),
            'programmes_id'     =>     $request->input('programme')
        ]);

        $demandeurs->save();

        $demandeurs->modules()->sync($request->modules);
        $demandeurs->nivauxes()->sync($request->niveaux);
        $demandeurs->diplomes()->sync($request->diplomes);
        $demandeurs->departements()->sync($request->departements);

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
    public function edit(Demandeur $demandeur)
    {        
        /* $this->authorize('update',  $demandeur); */

        $utilisateurs = $demandeur->user;
        $demandeurs = $demandeur;


        $roles = Role::get();
        $civilites = User::pluck('civilite','civilite');
        $objets = Objet::distinct('name')->get()->pluck('name','name')->unique();
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $localites = Localite::distinct('name')->get()->pluck('name','name')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $types_demandes = Typedemande::distinct('name')->get()->pluck('name','name')->unique();
        $programmes = Programme::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $niveaux = Nivaux::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();

        return view('demandeurs.update', compact('demandeurs', 'departements','niveaux', 'modules',
        'types_demandes', 'programmes','localites','diplomes','utilisateurs', 'id', 'roles',
        'civilites', 'objets'));
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
        $this->validate(
            $request, [
                'objet'               =>  'required|string|max:50',
                'civilite'            =>  'required|string|max:10',
                'cin'                 =>  'required|string|min:12|max:18|unique:demandeurs,cin,'.$demandeur->id,
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'date_naiss'          =>  'required|date|max:50',
                'date_depot'          =>  'required|date|max:50',
                'lieu'                =>  'required|string|max:50',
                'telephone'           =>  'required|string|max:50',
                'email'               =>  'required|email|max:255|unique:users,email,'.$demandeur->user->id,
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier,'.$demandeur->id,
                'localite'            =>  'required',
                'type_demande'        =>  'required',
                'programme'           =>  'required',
                'niveaux'             =>  'required',
                'diplomes'            =>  'required',
                'modules'             =>  'required',
            ]
        );

        $utilisateurs   =   $demandeur->user;

        $utilisateurs->civilite                  =      $request->input('civilite');
        $utilisateurs->firstname                 =      $request->input('prenom');
        $utilisateurs->name                      =      $request->input('nom');
        $utilisateurs->email                     =      $request->input('email');
        $utilisateurs->username                  =      $request->input('username');
        $utilisateurs->telephone                 =      $request->input('telephone');
        $utilisateurs->situation_familiale       =      $request->input('familiale');
        $utilisateurs->situation_professionnelle =      $request->input('professionnelle');
        $utilisateurs->date_naissance            =      $request->input('date_naiss');
        $utilisateurs->lieu_naissance            =      $request->input('lieu');
        $utilisateurs->adresse                   =      $request->input('adresse');
        $utilisateurs->password                  =      Hash::make($request->input('email'));
        $utilisateurs->roles_id                  =      $utilisateurs->role->id;

        $utilisateurs->save();

        $types_demandes_id = Typedemande::where('name',$request->input('type_demande'))->first()->id;
        $objets_id = Objet::where('name',$request->input('objet'))->first()->id;
        $localites_id = Localite::where('name',$request->input('localite'))->first()->id;
        $programmes_id = Programme::where('sigle',$request->input('programme'))->first()->id;



        $demandeur->cin               =     $request->input('cin');
        $demandeur->numero_courrier   =     $request->input('numero_courrier');
        $demandeur->date_depot        =     $request->input('date_depot');
        $demandeur->experience        =     $request->input('experience');
        $demandeur->information       =     $request->input('information');
        $demandeur->projet            =     $request->input('projet');
        $demandeur->users_id          =     $utilisateurs->id;
        $demandeur->typedemandes_id   =     $types_demandes_id;
        $demandeur->objets_id         =     $objets_id;
        $demandeur->localites_id      =     $localites_id;
        $demandeur->programmes_id     =    $programmes_id;

        $demandeur->save();

        $demandeur->modules()->sync($request->input('modules'));
        $demandeur->nivauxes()->sync($request->input('niveaux'));
        $demandeur->diplomes()->sync($request->input('diplomes'));
        $demandeur->departements()->sync($request->input('departements'));


        return redirect()->route('demandeurs.index')->with('success','demandeur modifié avec succès !');
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
        $demandeurs = Demandeur::with('user.demandeur.modules','user.demandeur.localite')->orderBy('created_at', 'desc')->get();
        return Datatables::of($demandeurs)->make(true);

    }
}