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

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Gestionnaire|Demandeur');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_role  =   Auth::user()->role->name;
        

        $demandeurs = Demandeur::with('user.demandeur')->get()->pluck('user.demandeur','id'); 
      
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

        $pompiste = "0";
        $graisseur = "0";
        $laveur = "0";
        $rayonniste = "0";
        $chefboutique = "0";
        $managerstation = "0";
        $caissier = "0";

        if ($user_role == "Administrateur") {
            return view('demandeurs.index', 
            compact('ziguinchor', 
            'dakar', 
            'saintlouis', 
            'kaolack', 
            'total',
            'demandeurs',
            'graisseur',
            'laveur',
            'rayonniste',
            'chefboutique',
            'managerstation',
            'caissier',
            'pompiste'));
        } else {
            return view('demandeurs.index2', 
            compact('ziguinchor', 
            'dakar', 
            'saintlouis', 
            'kaolack', 
            'total',
            'demandeurs',
            'graisseur',
            'laveur',
            'rayonniste',
            'chefboutique',
            'managerstation',
            'caissier',
            'pompiste'));
        }
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
      
        return view('demandeurs.create',compact('roles', 'departements', 'diplomes', 'localites', 'civilites','niveaux', 'objets', 'types_demandes','modules','programmes'));

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
                'civilite'            =>  'required|string|max:10',
                'cin'                 =>  'required|string|min:12|max:18|unique:demandeurs,cin',
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'date_naiss'          =>  'required|date_format:Y-m-d',
                'date_depot'          =>  'required|date_format:Y-m-d',
                'lieu'                =>  'required|string|max:50',
                /* 'projet'              =>  'required|string|min:25|max:200', */
                'telephone'           =>  'required|string|max:50',
                'adresse'             =>  'required|string|max:100',
                'email'               =>  'required|email|max:255|unique:users,email',
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier',
                'localite'            =>  'required',
                'type_demande'        =>  'required',
                'programme'           =>  'required',
                'niveaux'             =>  'required',
                'diplomes'            =>  'exists:diplomes,id',
                'modules'             =>  'exists:modules,id',
                'departements'        =>  'exists:departements,id',
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

       
       $created_by1 = Auth::user()->firstname;
       $created_by2 = Auth::user()->name;
       $created_by3 = Auth::user()->username;

       $created_by = $created_by1.' '.$created_by2.' ('.$created_by3.')';

       $status = "Attente";

       $telephone = $request->input('telephone');
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);

        $utilisateur = new User([      
            'civilite'                  =>      $request->input('civilite'),      
            'firstname'                 =>      $request->input('prenom'),
            'name'                      =>      $request->input('nom'),
            'email'                     =>      $request->input('email'),
            'username'                  =>      $username,
            'status'                    =>      $status,
            'telephone'                 =>      $telephone,
            'situation_familiale'       =>      $request->input('familiale'),
            'situation_professionnelle' =>      $request->input('professionnelle'),
            'date_naissance'            =>      $request->input('date_naiss'),
            'lieu_naissance'            =>      $request->input('lieu'),
            'adresse'                   =>      $request->input('adresse'),
            'password'                  =>      Hash::make($request->input('email')),
            'roles_id'                  =>      $roles_id,
            'created_by'                =>      $created_by,
            'updated_by'                =>      $created_by

        ]);
        
        $utilisateur->save();

        $objets_id = Objet::where('name','Demande de formation')->first()->id;
        
        $diplomes = Diplome::where('id',$request->input('diplomes'))->first()->name;
        $modules = Module::where('id',$request->input('modules'))->first()->name;

        if ($modules == "Laveur" OR $modules == "Graisseur" OR $modules == "Pompiste" OR $modules == "Rayonniste") {
            if ($diplomes == "Licence 1" OR $diplomes == "Licence 2" OR $diplomes == "Licence 3" OR $diplomes == "Master 1" OR $diplomes == "Master 2") {
                $note = "2";
            } elseif($diplomes == "BAC") {
                $note = "5";
            }elseif($diplomes == "BFEM") {
                $note = "10";
            }else{
                $note = "0";
            }
                       
        } elseif($modules == "Chef de boutique" OR $modules == "Manager de station" OR $modules == "Caissier") {

            if ($diplomes == "Licence 1") {
                $note = "2";
            } elseif($diplomes == "Licence 2") {
                $note = "5";
            }elseif($diplomes == "Licence 3") {
                $note = "10";
            } elseif($diplomes == "Master 1" OR $diplomes == "Master 2") {
                $note = "10";
            }else{
                $note = "0";
            }
            
        }

       $cin = $request->input('cin');
       $cin = str_replace(' ', '', $cin);
       $cin = str_replace(' ', '', $cin);
       $cin = str_replace(' ', '', $cin);

        $demandeurs = new Demandeur([
            'cin'               =>     $cin,
            'numero_courrier'   =>     $request->input('numero_courrier'),
            'date_depot'        =>     $request->input('date_depot'),
            'experience'        =>     $request->input('experience'),
            'projet'            =>     $request->input('projet'),
            'information'       =>     $request->input('information'),
            'users_id'          =>     $utilisateur->id,
            'typedemandes_id'   =>     $request->input('type_demande'),
            'objets_id'         =>     $objets_id,
            'note'              =>     $note,
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
    public function show($id)
    {
        if (Auth::user()->role->name == "Administrateur") {        
        $demandeurs = Demandeur::find($id);

        $utilisateurs = $demandeurs->user;

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
        return view('demandeurs.show', compact('demandeurs', 'departements','niveaux', 'modules',
        'types_demandes', 'programmes','localites','diplomes','utilisateurs', 'roles', 'id',
        'civilites', 'objets'));
        } else {
            return view('layout.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        
                
       /*  $user = Auth::user()->username;
        dd($user); */
        
        /* $this->authorize('update',  $demandeur); */

        $demandeurs = Demandeur::find($id);

        $utilisateurs = $demandeurs->user;

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
        'types_demandes', 'programmes','localites','diplomes','utilisateurs', 'roles', 'id',
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
                'civilite'            =>  'required|string|max:10',
                'cin'                 =>  'required|string|min:12|max:18|unique:demandeurs,cin,'.$demandeur->id,
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'date_naiss'          =>  'required|date_format:Y-m-d',
                'date_depot'          =>  'required|date_format:Y-m-d',
                'lieu'                =>  'required|string|max:50',
                /* 'projet'              =>  'required|string|min:25|max:200', */
                'telephone'           =>  'required|string|max:50',
                'adresse'             =>  'required|string|max:100',
                'email'               =>  'required|email|max:255|unique:users,email,'.$demandeur->user->id,
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier,'.$demandeur->id,
                'localite'            =>  'required',
                'type_demande'        =>  'required',
                'programme'           =>  'required',
                'niveaux'             =>  'required',
                'diplomes'            =>  'exists:diplomes,id',
                'modules'             =>  'exists:modules,id',
                'departements'        =>  'exists:departements,id',
            ]
        );

        $utilisateurs   =   $demandeur->user;

        $updated_by1 = Auth::user()->firstname;
        $updated_by2 = Auth::user()->name;
        $updated_by3 = Auth::user()->username;

        $updated_by = $updated_by1.' '.$updated_by2.' ('.$updated_by3.')';

        
       $telephone = $request->input('telephone');
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);


        $utilisateurs->civilite                  =      $request->input('civilite');
        $utilisateurs->firstname                 =      $request->input('prenom');
        $utilisateurs->name                      =      $request->input('nom');
        $utilisateurs->email                     =      $request->input('email');
        $utilisateurs->username                  =      $request->input('username');
        $utilisateurs->telephone                 =      $telephone;
        $utilisateurs->situation_familiale       =      $request->input('familiale');
        $utilisateurs->situation_professionnelle =      $request->input('professionnelle');
        $utilisateurs->date_naissance            =      $request->input('date_naiss');
        $utilisateurs->lieu_naissance            =      $request->input('lieu');
        $utilisateurs->adresse                   =      $request->input('adresse');
        $utilisateurs->password                  =      Hash::make($request->input('email'));
        $utilisateurs->roles_id                  =      $utilisateurs->role->id;
        $utilisateurs->updated_by                =      $updated_by;

        $utilisateurs->save();

        
        $objets_id = Objet::where('name','Demande de formation')->first()->id;

        $types_demandes_id = Typedemande::where('name',$request->input('type_demande'))->first()->id;
        /* $objets_id = Objet::where('name',$request->input('objet'))->first()->id; */
        $localites_id = Localite::where('name',$request->input('localite'))->first()->id;
        $programmes_id = Programme::where('sigle',$request->input('programme'))->first()->id;

        
        $diplomes = Diplome::where('id',$request->input('diplomes'))->first()->name;
        $modules = Module::where('id',$request->input('modules'))->first()->name;

        if ($modules == "Laveur" OR $modules == "Graisseur" OR $modules == "Pompiste" OR $modules == "Rayonniste") {
            if ($diplomes == "Licence 1" OR $diplomes == "Licence 2" OR $diplomes == "Licence 3" OR $diplomes == "Master 1" OR $diplomes == "Master 2") {
                $note = "2";
            } elseif($diplomes == "BAC") {
                $note = "5";
            }elseif($diplomes == "BFEM") {
                $note = "10";
            }else{
                $note = "5";
            }
                       
        } elseif($modules == "Chef de boutique" OR $modules == "Manager de station" OR $modules == "Caissier") {

            if ($diplomes == "Licence 1") {
                $note = "2";
            } elseif($diplomes == "Licence 2") {
                $note = "5";
            }elseif($diplomes == "Licence 3") {
                $note = "10";
            } elseif($diplomes == "Master 1" OR $diplomes == "Master 2") {
                $note = "10";
            }else{
                $note = "5";
            }
            
        }
        
       $cin = $request->input('cin');
       $cin = str_replace(' ', '', $cin);
       $cin = str_replace(' ', '', $cin);
       $cin = str_replace(' ', '', $cin);

        $demandeur->cin               =     $cin;
        $demandeur->numero_courrier   =     $request->input('numero_courrier');
        $demandeur->date_depot        =     $request->input('date_depot');
        $demandeur->experience        =     $request->input('experience');
        $demandeur->information       =     $request->input('information');
        $demandeur->projet            =     $request->input('projet');
        $demandeur->users_id          =     $utilisateurs->id;
        $demandeur->typedemandes_id   =     $types_demandes_id;
        $demandeur->objets_id         =     $objets_id;
        $demandeur->note              =     $note;
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
        $utilisateurs   =   $demandeur->user;

        $deleted_by1 = Auth::user()->firstname;
        $deleted_by2 = Auth::user()->name;
        $deleted_by3 = Auth::user()->username;

        $deleted_by = $deleted_by1.' '.$deleted_by2.' ('.$deleted_by3.')';

        $utilisateurs->deleted_by      =      $deleted_by;

        $utilisateurs->save();
       
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