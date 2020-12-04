<?php

namespace App\Http\Controllers;

use App\Operateur;
use App\Role;
use App\User;
use App\Structure;
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
        $structures = Structure::select('name')->distinct()->get();

        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
                
        $types_demandes = Typedemande::distinct('name')->get()->pluck('name','id')->unique();
        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();

        return view('operateurs.create',compact('roles', 'civilites','structures','types_demandes','modules'));
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
                'ninea'               =>  'required|string|max:255|unique:users,ninea',
                'registre'            =>  'required|string|max:50',
                'quitus'              =>  'required|string|max:255|unique:users,quitus',
                'email_s'             =>  'required|email|max:255|unique:users,email',
                'telephone_s'         =>  'required|string|max:50',
                'adresse'             =>  'required|string|max:50',

                'cin'                 =>  'required|string|min:12|max:18|unique:demandeurs,cin',
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
    public function edit(Operateur $operateur)
    {
        //
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
        //
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
