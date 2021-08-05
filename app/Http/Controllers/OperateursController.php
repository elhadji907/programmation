<?php

namespace App\Http\Controllers;

use App\Operateur;
use App\Role;
use App\User;
use App\Typedemande;
use App\Module;
use App\Departement;
use App\TypesOperateur;
use App\Region;
use Auth;
use PDF;
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

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Operateur::all();
  
        // share data to view
        view()->share('operateur',$data);
        $pdf = PDF::loadView('operateurs/pdf_view', $data);
  
        // download PDF file with download method
        //dd($pdf);
        return $pdf->download('pdf_file.pdf');
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
                        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();

        $departements = Departement::distinct('nom')->get()->pluck('nom','nom')->unique();
        
        $types_operateurs = TypesOperateur::distinct('name')->get()->pluck('name','name')->unique();

        $regions = Region::distinct('nom')->get()->pluck('nom','nom')->unique();

        return view('operateurs.create',compact('roles', 'civilites', 'modules', 'departements', 'regions','types_operateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth::user();

        $this->validate(
            $request, [
                'numero_agrement'           =>       "required|string|unique:operateurs,numero_agrement,NULL,id,deleted_at,NULL",
                'email1'                    =>       "required|email|unique:operateurs,email1,NULL,id,deleted_at,NULL",
                'operateur'                 =>       "required|string|max:255|unique:operateurs,name,NULL,id,deleted_at,NULL",
                'sigle'                     =>       "required|string|max:50|unique:operateurs,sigle,NULL,id,deleted_at,NULL",
                'ninea'                     =>       "required|string|max:255|unique:operateurs,ninea,NULL,id,deleted_at,NULL",
                'quitus'                    =>       "required|string|max:255|unique:operateurs,quitus,NULL,id,deleted_at,NULL",
                'telephone1'                =>       'required|string|max:15',
                'adresse_op'                =>       'required|string',
                'prenom'                    =>       'required|string|max:50',
                'nom'                       =>       'required|string|max:50',
                'email'                     =>       'required|email|max:255|unique:users,email,'.$user->id,
                'telephone'                 =>       'required|string|max:15',
                'departement'               =>       'required',
                'regions'                   =>       'required',
                'type_structure'            =>       'required',
                'type_operateur'            =>       'required',
                'sexe'                      =>       'required',
                'cin'                       =>       'required',
                'fonction_responsable'      =>       'required',
                'fixe_op'                   =>       'required',
                'telephone1'                =>       'required',
                'debut_quitus'              =>       'required|date',
                'fin_quitus'                =>       'required|date',
            ]
        );

        /* dd($user); */

        $roles_id = Role::where('name','Operateur')->first()->id;        
        $user_id = User::latest('id')->first()->id;
        $username   =   strtolower($request->input('nom').$user_id);

        /* dd($username); */
       
       $created_by1 = Auth::user()->firstname;
       $created_by2 = Auth::user()->name;
       $created_by3 = Auth::user()->username;

       $created_by = $created_by1.' '.$created_by2.' ('.$created_by3.')';

       $telephone = $request->input('telephone');
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);

       if ($request->input('sexe') == "M") {
        $civilite = "M.";
        }elseif ($request->input('sexe') == "F") {
            $civilite = "Mme";
        }else {
            $civilite = "";
        }

       $utilisateur = new User([      
        'sexe'                      =>      $request->input('sexe'),    
        'civilite'                  =>      $civilite,
        'firstname'                 =>      $request->input('prenom'),
        'name'                      =>      $request->input('nom'),
        'email'                     =>      $request->input('email'),
        'username'                  =>      $username,
        'telephone'                 =>      $telephone,
        'bp'                        =>      $request->input('bp'),
        'fax'                       =>      $request->input('fax'),
        'date_naissance'            =>      $request->input('date_naiss'),
        'lieu_naissance'            =>      $request->input('lieu_naissance'),
        'adresse'                   =>      $request->input('adresse'),
        'password'                  =>      Hash::make($request->input('email')),
        'roles_id'                  =>      $roles_id,
        'created_by'                =>      $created_by,
        'updated_by'                =>      $created_by
    ]);
    
    $utilisateur->save();

    
    $telephone = $request->input('telephone');
    $telephone = str_replace(' ', '', $telephone);
    $telephone = str_replace(' ', '', $telephone);
    $telephone = str_replace(' ', '', $telephone);

    
    $departements_id = Departement::where('nom',$request->input('departement'))->first()->id;    
    $types_operateurs_id = TypesOperateur::where('name',$request->input('type_operateur'))->first()->id;    

    $operateurs = new Operateur([
        'cin_responsable'               =>      $request->input('cin'),
        'numero_agrement'               =>      $request->input('numero_agrement'),
        'date_debut'                    =>      $request->input('date_depot'),
        'name'                          =>      $request->input('operateur'),
        'type_structure'                =>      $request->input('type_structure'),
        'sigle'                         =>      $request->input('sigle'),
        'fixe'                          =>      $request->input('fixe_op'),
        'ninea'                         =>      $request->input('ninea'),
        'rccm'                          =>      $request->input('registre'),
        'quitus'                        =>      $request->input('quitus'),
        'email1'                        =>      $request->input('email1'),
        'email2'                        =>      $request->input('email2'),
        'telephone1'                    =>      $request->input('telephone1'),
        'telephone2'                    =>      $request->input('telephone2'),
        'adresse'                       =>      $request->input('adresse'),
        'fonction_responsable'          =>      $request->input('fonction_responsable'),        
        'prenom_responsable'            =>      $request->input('prenom'),
        'nom_responsable'               =>      $request->input('nom'),
        'email_responsable'             =>      $request->input('email'),        
        'telephone_responsable'         =>      $request->input('email'), 
        'types_operateurs_id'           =>      $types_operateurs_id,
        'departements_id'               =>      $departements_id,
        'users_id'                      =>      $utilisateur->id,
    ]);

    $operateurs->save();

    $operateur->regions()->sync($request->input('regions'));

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
        $user = $operateur->user;

        $modules = $operateur->modules;

        dd($operateur);
        
        return view('operateurs.details', compact('operateur','user','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Operateur $operateur)
    {
        $utilisateurs = $operateur->user;

        $roles = Role::get();
        $civilites = User::pluck('civilite','civilite');
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','nom')->unique();
        $types_operateurs = TypesOperateur::distinct('name')->get()->pluck('name','name')->unique();
        $regions = Region::distinct('nom')->get()->pluck('nom','id')->unique();

        return view('operateurs.update', compact('operateur', 'modules','utilisateurs', 'roles', 'civilites', 'structures','departements','regions','types_operateurs'));

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
                'email1'              =>  "required|email|unique:operateurs,email1,{$operateur->id},id,deleted_at,NULL",
                'operateur'           =>  "required|string|max:255|unique:operateurs,name,{$operateur->id},id,deleted_at,NULL",
                'sigle'               =>  "required|string|max:50|unique:operateurs,sigle,{$operateur->id},id,deleted_at,NULL",
                'ninea'               =>  "required|string|max:255|unique:operateurs,ninea,{$operateur->id},id,deleted_at,NULL",
                'registre'            =>  "required|string|max:50|unique:operateurs,rccm,{$operateur->id},id,deleted_at,NULL",
                'quitus'              =>  "required|string|max:255|unique:operateurs,quitus,{$operateur->id},id,deleted_at,NULL",
                'telephone1'          =>  'required|string|max:15',
                'adresse'             =>  'required|string',
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'email'               =>  "required|email|max:255|unique:users,email,{$operateur->user->id},id,deleted_at,NULL",
                'telephone'           =>  'required|string|max:15',
            ]
        );

        //dd($operateur);

        $utilisateur   =   $operateur->user;
        $updated_by1 = Auth::user()->firstname;
        $updated_by2 = Auth::user()->name;
        $updated_by3 = Auth::user()->username;

        $updated_by = $updated_by1.' '.$updated_by2.' ('.$updated_by3.')';
        $departement_id = Departement::where('nom',$request->input('departement'))->first()->id;
        $types_operateurs_id = TypesOperateur::where('name',$request->input('type_operateur'))->first()->id;  

        
        $telephone = $request->input('telephone');
        $telephone = str_replace(' ', '', $telephone);
        $telephone = str_replace(' ', '', $telephone);
        $telephone = str_replace(' ', '', $telephone);

        if ($request->input('sexe') == "M") {
            $civilite = "M.";
        }elseif ($request->input('sexe') == "F") {
            $civilite = "Mme";
        }else {
            $civilite = "";
        }

        $utilisateur->sexe                  =      $request->input('sexe');
        $utilisateur->civilite              =      $civilite;
        $utilisateur->firstname             =      $request->input('prenom');
        $utilisateur->name                  =      $request->input('nom');
        $utilisateur->email                 =      $request->input('email');
        $utilisateur->telephone             =      $request->input('telephone');
        $utilisateur->adresse               =      $request->input('adresse');
        $utilisateur->bp                    =      $request->input('bp');
        $utilisateur->fax                   =      $request->input('fax');
        $utilisateur->updated_by            =      $updated_by;

        $utilisateur->save();

        $operateur->name                    =      $request->input('operateur');
        $operateur->sigle                   =      $request->input('sigle');
        $operateur->numero_agrement         =      $request->input('numero_agrement');
        $operateur->ninea                   =      $request->input('ninea');
        $operateur->rccm                    =      $request->input('registre');
        $operateur->quitus                  =      $request->input('quitus');
        $operateur->email1                  =      $request->input('email1');
        $operateur->email2                  =      $request->input('email2');
        $operateur->telephone1              =      $request->input('telephone1');
        $operateur->telephone2              =      $request->input('telephone2');
        $operateur->adresse                 =      $request->input('adresse');

        $operateur->nom_responsable         =      $request->input('nom');
        $operateur->prenom_responsable      =      $request->input('prenom');
        $operateur->cin_responsable         =      $request->input('cin');
        $operateur->telephone_responsable   =      $request->input('telephone');
        $operateur->email_responsable       =      $request->input('email');
        $operateur->fonction_responsable    =      $request->input('fonction_responsable');
        $operateur->departements_id         =      $departement_id;
        $operateur->types_operateurs_id     =      $types_operateurs_id;
        $operateur->type_structure          =      $request->input('type_structure');
        $operateur->users_id                =      $utilisateur->id;

        $operateur->save();

        $operateur->regions()->sync($request->input('regions'));

        return redirect()->route('operateurs.index')->with('success','operateur modifiée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operateur  $operateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operateur $operateur)
    {
      /*   if (auth::user()->role->name === "Administrateur") {

        }else {
            $this->authorize('delete',  $operateur);
        } */

        $utilisateurs   =   $operateur->user;

        $deleted_by1 = Auth::user()->firstname;
        $deleted_by2 = Auth::user()->name;
        $deleted_by3 = Auth::user()->username;

        $deleted_by = $deleted_by1.' '.$deleted_by2.' ('.$deleted_by3.')';

        $utilisateurs->deleted_by      =      $deleted_by;

        $utilisateurs->save();
       
        if (auth::user()->role->name === "Administrateur") {
            $operateur->user->delete();
            $operateur->delete();
        } else {
            $operateur->delete();
        }
        
        $operateur->delete();

        
        $message = $operateur->user->firstname.' '.$operateur->user->name.' a été supprimé(e)';
        return back()->with(compact('message'));

    }

    public function list(Request $request)
    {
        /* $date = Carbon::today();
        $date = $date->copy()->addDays(-7); */

        $operateurs=Operateur::with('user.operateur.structure')->get();
        return Datatables::of($operateurs)->make(true);
    }
}
