<?php

namespace App\Http\Controllers;

use App\Individuelle;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Departement;
use App\Region;
use App\Diplome;
use App\Demandeur;
use App\Module;
use App\Programme;
use App\User;
use App\Role;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class IndividuellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individuelles = Individuelle::all();

        //dd($individuelles);
        $countries = DB::table('regions')->pluck("nom","id");

        return view('individuelles.index', compact('individuelles', 'countries'));
    }
    
    public function getStates($id) {
        $states = DB::table("departements")->where("regions_id",$id)->pluck("nom","id");
        return json_encode($states);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
        
        $date_depot = Carbon::now();

        return view('individuelles.create',compact('departements', 'diplomes', 'modules', 'programmes', 'date_depot'));
    }

    public function findNomDept(Request $request){
        $departements=Departement::select('nom','id')->where('regions_id',$request->id)->take(100)->get();
        return response()->json($departements);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $telephone = $request->input('telephone');
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       
        $this->validate(
            $request, [
                'sexe'                =>  'required|string|max:10',
                'cin'                 =>  'required|string|min:13|max:15|unique:individuelles,cin',
                'prenom'              =>  'required|string|max:50',
                'nom'                 =>  'required|string|max:50',
                'date_naiss'          =>  'required|date_format:Y-m-d',
                'date_depot'          =>  'required|date_format:Y-m-d',
                'lieu_naissance'      =>  'required|string|max:50',
                'telephone'           =>  'required|string|min:7|max:18',
                'fixe'                =>  'required|string|min:7|max:18',
                'etablissement'       =>  'required|string|max:50',
                'adresse'             =>  'required|string|max:100',
                'prerequis'           =>  'required|string|max:1500',
                'motivation'          =>  'required|string|max:1500',
                'email'               =>  'required|email|max:255|unique:users,email',
                'familiale'           =>  'required',
                'professionnelle'     =>  'required',
                'niveau_etude'        =>  'required',
                'departement'         =>  'required',
                'modules'             =>  'exists:modules,id',
                'diplome'             =>  'required',
                'option'              =>  'required',
            ]
        );

       $roles_id            =   Role::where('name','Individuelle')->first()->id;
       $user_id             =   User::latest('id')->first()->id;
       $demandeurs_id       =   Demandeur::latest('id')->first()->id;
       $username            =   strtolower($request->input('nom').$user_id);

       $annee = date('y');
       $demandeurs_id = Demandeur::latest('id')->first()->id;
       $longueur = strlen($demandeurs_id);

       if ($longueur <= 1) {
           $numero   =   "I".strtolower($annee."0000".$demandeurs_id);
       }elseif ($longueur >= 2 && $longueur < 3) {
           $numero   =   "I".strtolower($annee."000".$demandeurs_id);
       }elseif ($longueur >= 3 && $longueur < 4) {
           $numero   =   "I".strtolower($annee."00".$demandeurs_id);
       }elseif ($longueur >= 4 && $longueur < 5) {
           $numero   =   "I".strtolower($annee."0".$demandeurs_id);
       }elseif ($longueur >= 5) {
           $numero   =   "I".strtolower($annee.$demandeurs_id);
       }else {
           $numero   =   "I".strtolower($annee.$demandeurs_id);
       }
       
       $departement = Departement::find($request->input('departement'));
       $region = $departement->region->nom;
       $region_id = $departement->region->id;

       $created_by1 = Auth::user()->firstname;
       $created_by2 = Auth::user()->name;
       $created_by3 = Auth::user()->username;

       $created_by = $created_by1.' '.$created_by2.' ('.$created_by3.')';

       $statut = "Attente";

       $telephone = $request->input('telephone');
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);
       $telephone = str_replace(' ', '', $telephone);

       $fixe = $request->input('fixe');
       $fixe = str_replace(' ', '', $fixe);
       $fixe = str_replace(' ', '', $fixe);
       $fixe = str_replace(' ', '', $fixe);

       $autre_tel = $request->input('autre_tel');
       $autre_tel = str_replace(' ', '', $autre_tel);
       $autre_tel = str_replace(' ', '', $autre_tel);
       $autre_tel = str_replace(' ', '', $autre_tel);

       $diplome_id = Diplome::where('id',$request->input('diplome'))->first()->id;
       $modules = Module::where('id',$request->input('modules'))->first()->name;

        $cin = $request->input('cin');
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);         
        
        if ($request->input('sexe') == "M") {
            $civilite = "M.";
        }elseif ($request->input('sexe') == "F") {
            $civilite = "Mme";
        }else {
            $civilite = "";
        }

        $utilisateur = new User([      
            'civilite'                  =>      $request->input('civilite'),      
            'sexe'                      =>      $request->input('sexe'),      
            'civilite'                  =>      $civilite,      
            'firstname'                 =>      $request->input('prenom'),
            'name'                      =>      $request->input('nom'),
            'email'                     =>      $request->input('email'),
            'username'                  =>      $username,
            'telephone'                 =>      $telephone,
            'fixe'                      =>      $fixe,
            'bp'                        =>      $request->input('bp'),
            'fax'                       =>      $request->input('fax'),
            'situation_familiale'       =>      $request->input('familiale'),
            'situation_professionnelle' =>      $request->input('professionnelle'),
            'date_naissance'            =>      $request->input('date_naiss'),
            'lieu_naissance'            =>      $request->input('lieu_naissance'),
            'adresse'                   =>      $request->input('adresse'),
            'password'                  =>      Hash::make($request->input('email')),
            'roles_id'                  =>      $roles_id,
            'created_by'                =>      $created_by,
            'updated_by'                =>      $created_by

        ]);
        
        $utilisateur->save();

        $demandeur = new Demandeur([
            'numero'                    =>     $numero,
            'numero_courrier'           =>     $numero,
            'date_depot'                =>     $request->input('date_depot'),
            'nbre_piece'                =>     $request->input('nombre_de_piece'),
            'situation_professionnelle' =>     $request->input('professionnelle'),
            'niveau_etude'              =>     $request->input('niveau_etude'),
            'etablissement'             =>     $request->input('etablissement'),
            'telephone'                 =>     $autre_tel,
            'fixe'                      =>     $fixe,
            'statut'                    =>     $statut,
            'programmes_id'             =>     $request->input('programme'),
            'type'                      =>     $request->input('option'),
            'adresse'                   =>     $request->input('adresse'),
            'motivation'                =>     $request->input('motivation'),
            'reference'                 =>     $request->input('motivation'),
            'diplome'                   =>     $request->input('autres_diplomes'),
            'experience'                =>     $request->input('experience'),
            'qualification'             =>     $request->input('qualification'),
            'departements_id'           =>     $request->input('departement'),
            'diplomes_id'                =>    $diplome_id,
            'users_id'                  =>     $utilisateur->id
        ]);

        $demandeur->save();

        $individuelle = new Individuelle([
            'cin'               =>     $cin,
            'experience'        =>     $request->input('experience'),
            'information'       =>     $request->input('information'),
            'nbre_pieces'       =>     $request->input('nombre_de_piece'),
            'information'       =>     $request->input('information'),
            'prerequis'         =>     $request->input('prerequis'),
            'telephone'         =>     $autre_tel,
            'demandeurs_id'     =>     $demandeur->id
        ]);

        $individuelle->save();

        $demandeur->modules()->sync($request->modules);

        return redirect()->route('individuelles.index')->with('success','demandeur ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function show(Individuelle $individuelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $individuelles = Individuelle::find($id);
        $demandeurs = $individuelles->demandeur;
        $utilisateurs = $demandeurs->user;

        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();

        $date_depot = Carbon::now();

        return view('individuelles.update',compact('individuelles', 'departements', 'diplomes', 'modules', 'programmes', 'date_depot'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Individuelle $individuelle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Individuelle $individuelle)
    {
        $utilisateurs   =   $individuelle->demandeur->user;

        $deleted_by1 = Auth::user()->firstname;
        $deleted_by2 = Auth::user()->name;
        $deleted_by3 = Auth::user()->username;

        $deleted_by = $deleted_by1.' '.$deleted_by2.' ('.$deleted_by3.')';

        $utilisateurs->deleted_by      =      $deleted_by;

        $utilisateurs->save();
       
        $individuelle->demandeur->user->delete();
        $individuelle->demandeur->delete();
        $individuelle->delete();
        
        $message = $individuelle->demandeur->user->firstname.' '.$individuelle->demandeur->user->name.' a été supprimé(e)';
        return back()->with(compact('message'));
    }
    public function list(Request $request)
    {
        $modules=Individuelle::with('individuelle.demandeur.modules')->get();
        return Datatables::of($modules)->make(true);

    }
}
