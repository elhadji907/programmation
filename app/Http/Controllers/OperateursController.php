<?php

namespace App\Http\Controllers;

use App\Operateur;
use App\Role;
use App\User;
use App\Typedemande;
use App\Module;
use Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class OperateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Operateur');
    }

    public function index()
    {
       $operateurs = \App\Operateur::all();

       return view('operateurs.index', compact('operateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();    

        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
                
        $types_demandes = Typedemande::distinct('name')->get()->pluck('name','id')->unique();
        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();

        return view('operateurs.create',compact('roles', 'civilites','types_demandes','modules'));
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
                
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier',
                'date_depot'          =>  'required|date_format:Y-m-d',

                'name'                =>  'required|string|max:255|unique:users,name',
                'sigle'               =>  'required|string|max:50',
                'ninea'               =>  'required|string|max:255|unique:operateurs,ninea',
                'registre'            =>  'required|string|max:50',
                'quitus'              =>  'required|string|max:255|unique:operateurs,quitus',
                'email_s'             =>  'required|email|max:255|unique:operateurs,email',
                'telephone_s'         =>  'required|string|max:50',
                'adresse_s'           =>  'required|string',

                /* 'cin'                 =>  'required|string|min:12|max:18|unique:operateurs,cin', */
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'email'               =>  'required|email|max:255|unique:users,email',
                'telephone'           =>  'required|string|max:50',
                'statut'              =>  'required|string|max:100',
                
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

        $roles_id = Role::where('name','Operateur')->first()->id;

       /*  dd($roles_id); */
        
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
        /* 'civilite'                  =>      $request->input('civilite'),   */    
        'firstname'                 =>      $request->input('prenom'),
        'name'                      =>      $request->input('nom'),
        'email'                     =>      $request->input('email'),
        'username'                  =>      $username,
        'telephone'                 =>      $telephone,
        'status'                    =>      $request->input('statut'),
        'adresse'                   =>      $request->input('adresse'),
        'password'                  =>      Hash::make($request->input('email')),
        'roles_id'                  =>      $roles_id,
        'created_by'                =>      $created_by,
        'updated_by'                =>      $created_by
    ]);

    /* dd($utilisateur); */
    
    $utilisateur->save();

    
    $telephone_s = $request->input('telephone_s');
    $telephone_s = str_replace(' ', '', $telephone_s);
    $telephone_s = str_replace(' ', '', $telephone_s);
    $telephone_s = str_replace(' ', '', $telephone_s);

    $operateurs = new Operateur([
        /* 'cin'               =>     $cin, */
        'numero'            =>      $request->input('numero_courrier'),
        'date_debut'        =>      $request->input('date_depot'),
        'name'              =>      $request->input('name'),
        'sigle'             =>      $request->input('sigle'),
        'ninea'             =>      $request->input('ninea'),
        'registre'          =>      $request->input('registre'),
        'quitus'            =>      $request->input('quitus'),
        'email'             =>      $request->input('email_s'),
        'telephone'         =>      $request->input('telephone_s'),
        'adresse'           =>      $request->input('adresse_s'),
        'structures_id'     =>      $request->input('structure'),
        'users_id'          =>      $utilisateur->id,
        'status'            =>      $request->input('statut'),
    ]);

    /* dd($operateurs); */

    $operateurs->save();

    
    $operateurs->modules()->sync($request->modules);

    return redirect()->route('operateurs.index')->with('success','opérateur ajouté avec succès !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function show(Operateur $operateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operateurs = Operateur::find($id);
        $utilisateurs = $operateurs->user;

        $roles = Role::get();
        $civilites = User::pluck('civilite','civilite');
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();

        return view('operateurs.update', compact('operateurs', 'modules','utilisateurs', 'roles', 'id','civilites', 'structures'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operateur $operateur)
    {
        $this->validate(
            $request, [                
                'numero_agrement'     =>  "required|string|unique:operateurs,numero_agrement,{$operateur->id},id,deleted_at,NULL",
                'date_depot'          =>  'required|date_format:Y-m-d',
                'name'                =>  'required|string|max:255|unique:users,name',
                'sigle'               =>  'required|string|max:50',
                'ninea'               =>  "required|string|max:255|unique:operateurs,ninea,{$operateur->id},id,deleted_at,NULL",
                'registre'            =>  'required|string|max:50',
                'quitus'              =>  "required|string|max:255|unique:operateurs,quitus,{$operateur->id},id,deleted_at,NULL",
                'email_s'             =>  "required|email|max:255|unique:users,email,{$operateur->id},id,deleted_at,NULL",
                'telephone_s'         =>  'required|string|max:50',
                'adresse_s'           =>  'required|string',
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'email'               =>  "required|email|max:255|unique:users,email,{$operateur->id},id,deleted_at,NULL",
                'telephone'           =>  'required|string|max:50',
                'statut'              =>  'required|string|max:100',                
                'modules'             =>  'exists:modules,id',
                'departements'        =>  'exists:departements,id',
            ]
        );

        $utilisateurs   =   $operateur->user;
        $updated_by1 = Auth::user()->firstname;
        $updated_by2 = Auth::user()->name;
        $updated_by3 = Auth::user()->username;

        $updated_by = $updated_by1.' '.$updated_by2.' ('.$updated_by3.')';

        
        $telephone_s = $request->input('telephone_s');
        $telephone_s = str_replace(' ', '', $telephone_s);
        $telephone_s = str_replace(' ', '', $telephone_s);
        $telephone_s = str_replace(' ', '', $telephone_s);

       /*  dd($utilisateurs); */

        $utilisateurs->numero            =      $request->input('numero_courrier');
        $utilisateurs->date_debut        =      $request->input('date_depot');
        $utilisateurs->name              =      $request->input('name');
        $utilisateurs->sigle             =      $request->input('sigle');
        $utilisateurs->ninea             =      $request->input('ninea');
        $utilisateurs->registre          =      $request->input('registre');
        $utilisateurs->quitus            =      $request->input('quitus');
        $utilisateurs->email             =      $request->input('email_s');
        $utilisateurs->telephone         =      $request->input('telephone_s');
        $utilisateurs->adresse           =      $request->input('adresse_s');
        $utilisateurs->structures_id     =      $request->input('structure');
        $utilisateurs->users_id          =      $utilisateur->id;
        $utilisateurs->status            =      $request->input('statut');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operateur $operateur)
    {
        
        $operateur->delete();
        $message = "L'opérateur ".$operateur->name.' a été supprimé avec succès';
        return redirect()->route('operateurs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        /* $date = Carbon::today();
        $date = $date->copy()->addDays(-7); */

        $operateurs=Operateur::with('user.operateur.structure')->get();
        return Datatables::of($operateurs)->make(true);
    }
}
