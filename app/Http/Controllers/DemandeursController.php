<?php

namespace App\Http\Controllers;

use App\Demandeur;
use App\Diplome;
use App\Role;
use App\Objet;
use App\User;
use App\Courrier;
use App\Departement;
use App\Typesdemande;
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

      /*   $date = Carbon::today()->toDateString();
        dd($date); */

        $user_role  =   Auth::user()->role->name;
        
        $demandeurs = Demandeur::all();
        
        return view('demandeurs.index',compact('roles','demandeurs'));

        /* dd($demandeurs); */

      /*  $localites = Localite::with('demandeurs.localite')->get();
      
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

        $thies = Demandeur::with('user.demandeur.localite')
        ->get()->where('user.demandeur.localite.name','Thiès')
        ->pluck('user.demandeur.localite.name','id')->count(); */

        /* $total = $ziguinchor+$dakar+$saintlouis+$kaolack+$thies;

        $pompiste = "0";
        $graisseur = "0";
        $laveur = "0";
        $rayonniste = "0";
        $chefboutique = "0";
        $managerstation = "0";
        $caissier = "0";

        if ($user_role == "Administrateur") {
            return view('demandeurs.index', 
            compact('ziguinchor', 'localites',
            'dakar', 
            'saintlouis', 
            'kaolack',
            'thies',
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
            compact('ziguinchor', 'localites',
            'dakar', 
            'saintlouis', 
            'kaolack',
            'thies',
            'total',
            'demandeurs',
            'graisseur',
            'laveur',
            'rayonniste',
            'chefboutique',
            'managerstation',
            'caissier',
            'pompiste'));
        } */
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
        
        //$objets = Objet::distinct('name')->get()->pluck('name','id')->unique();
        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
      
        return view('demandeurs.create',compact('roles', 'departements', 'diplomes', 'civilites', 'modules','programmes'));

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
            'typesdemandes_id'  =>     $request->input('type_demande'),
            'objets_id'         =>     $objets_id,
            'status'            =>     $status,
            'localites_id'      =>     $request->input('localite'),
            'programmes_id'     =>     $request->input('programme')
        ]);

        $demandeurs->save();

        $demandeurs->modules()->sync($request->modules);

        return redirect()->route('demandeurs.create')->with('success','demandeur ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demandeur  $demandeur
     * @return \Illuminate\Http\Response
     */
    public function show(Demandeur $demandeur)
    {
        $typesdemande = $demandeur->types_demande->name;
        $individuelles = $demandeur->individuelles;
        $collectives = $demandeur->collectives;

       /*  if (Auth::user()->role->name == "Administrateur") { */

        $utilisateurs = $demandeur->user;

        $roles = Role::get();
        $civilites = User::pluck('civilite','civilite');
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $types_demandes = Typesdemande::distinct('name')->get()->pluck('name','name')->unique();
        $programmes = Programme::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();

        if ($typesdemande === "Individuelle") {
            return view('individuelles.show', compact('individuelles', 'departements','niveaux', 'modules',
            'types_demandes', 'programmes','diplomes','utilisateurs', 'roles', 'id', 'civilites'));
        }elseif ($typesdemande === "Collective") {
            return view('collectives.show', compact('collectives', 'departements','niveaux', 'modules',
            'types_demandes', 'programmes','diplomes','utilisateurs', 'roles', 'id', 'civilites'));
        }else {
            return back();
        }
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

        $typesdemande = $demandeur->types_demande->name;
        $individuelles = $demandeur->individuelles;
        $collectives = $demandeur->collectives;

        $utilisateurs = $demandeur->user;

        $roles = Role::get();
        $civilites = User::pluck('civilite','civilite');
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $types_demandes = Typesdemande::distinct('name')->get()->pluck('name','name')->unique();
        $programmes = Programme::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();

        if ($typesdemande == 'Individuelle') {            
            return view('individuelles.details', compact('individuelles','demandeur'));
        
            } elseif($typesdemande == 'Collective') {   
            return view('collectives.details', compact('collectives','demandeur'));
        
            }else {
                return view('demandeurs.update', compact('demandeurs', 'departements','niveaux', 'modules',
                'types_demandes', 'programmes','localites','diplomes','utilisateurs', 'roles', 'id',
                'civilites', 'objets'));
            }

 
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

        $types_demandes_id = Typesdemande::where('name',$request->input('type_demande'))->first()->id;
        /* $objets_id = Objet::where('name',$request->input('objet'))->first()->id; */
        $localites_id = Localite::where('name',$request->input('localite'))->first()->id;
        $programmes_id = Programme::where('sigle',$request->input('programme'))->first()->id;
        $diplomes = Diplome::where('id',$request->input('diplomes'))->first()->name;
        $modules = Module::where('id',$request->input('modules'))->first()->name;
        
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
        $demandeur->status            =     $request->input('status');
        $demandeur->users_id          =     $utilisateurs->id;
        $demandeur->typesdemandes_id  =     $types_demandes_id;
        $demandeur->objets_id         =     $objets_id;
        $demandeur->localites_id      =     $localites_id;
        $demandeur->programmes_id     =    $programmes_id;

        $demandeur->save();

        $demandeur->modules()->sync($request->input('modules'));


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
        return back()->with(compact('message'));
    }

    public function list(Request $request)
    {
        $jour = Carbon::today()->toDateString();
        $hier = Carbon::yesterday()->toDateString();

        $anne1 = Carbon::today()->format('Y');

        $jour1 = "2020-09-03";
        $jour2 = "2020-09-04";
        $jour3 = "2020-09-07";
        $jour4 = "2020-09-08";
        $jour5 = "2020-09-09";
        $jour6 = "2020-09-10";
        
        $jour6 = "2020-09-10";

        $demandeurs = Demandeur::with('user.demandeur.modules','user.demandeur.localite')->whereDate('created_at','>=', $jour)->whereDate('created_at','<=', $jour)->get();
        return Datatables::of($demandeurs)->make(true);

    }
}