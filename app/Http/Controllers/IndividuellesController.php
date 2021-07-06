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
                'etablissement'       =>  'required|string|max:100',
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

       $roles_id            =   Role::where('name','Demandeur')->first()->id;
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
       //$modules = Module::where('id',$request->input('modules'))->first()->name;

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
            'niveau_etude'              =>     $request->input('niveau_etude'),
            'etablissement'             =>     $request->input('etablissement'),
            'telephone'                 =>     $autre_tel,
            'fixe'                      =>     $fixe,
            'statut'                    =>     $statut,
            'programmes_id'             =>     $request->input('programme'),
            'option'                    =>     $request->input('option'),
            'adresse'                   =>     $request->input('adresse'),
            'motivation'                =>     $request->input('motivation'),
            'autres_diplomes'           =>     $request->input('autres_diplomes'),
            'experience'                =>     $request->input('experience'),
            'qualification'             =>     $request->input('qualification'),
            'departements_id'           =>     $request->input('departement'),
            'diplomes_id'               =>     $diplome_id,
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
            'demandeurs_id'     =>     $demandeur->id
        ]);

        $individuelle->save();

        $demandeur->modules()->sync($request->input('modules'));

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
    public function edit(Individuelle $individuelle)
    {
        $this->authorize('update',  $individuelle);

        $demandeurs = $individuelle->demandeur;
        $utilisateurs = $demandeurs->user;

        $civilites = User::pluck('civilite','civilite');

        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('sigle')->get()->pluck('sigle','sigle')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','name')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','nom')->unique();

        $date_depot = Carbon::now();

        return view('individuelles.update',compact('civilites', 'individuelle', 'departements', 'diplomes', 'modules', 'programmes', 'date_depot', 'utilisateurs'));

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
        $this->authorize('update',  $individuelle);

        $demandeur = $individuelle->demandeur;
        $utilisateur = $demandeur->user;

         $this->validate(
        $request, [
            'sexe'                =>  'required|string|max:10',
            'cin'                 =>  'required|string|min:13|max:15|unique:individuelles,cin,'.$individuelle->id,
            'prenom'              =>  'required|string|max:50',
            'nom'                 =>  'required|string|max:50',
            'date_naiss'          =>  'required|date_format:Y-m-d',
            'date_depot'          =>  'required|date_format:Y-m-d',
            'lieu_naissance'      =>  'required|string|max:50',
            'telephone'           =>  'required|string|min:7|max:30',
            'fixe'                =>  'required|string|min:7|max:30',
            'etablissement'       =>  'required|string|max:100',
            'adresse'             =>  'required|string|max:100',
            'prerequis'           =>  'required|string|max:1500',
            'motivation'          =>  'required|string|max:1500',
            'email'               =>  'required|email|max:255|unique:users,email,'.$individuelle->demandeur->user->id,
            'familiale'           =>  'required',
            'professionnelle'     =>  'required',
            'niveau_etude'        =>  'required',
            'departement'         =>  'required',
            'modules'             =>  'exists:modules,id',
            'diplome'             =>  'required',
            'option'              =>  'required',
            ]
        );

        $utilisateurs   =   $individuelle->demandeur->user;

        $updated_by1 = Auth::user()->firstname;
        $updated_by2 = Auth::user()->name;
        $updated_by3 = Auth::user()->username;

        $updated_by = $updated_by1.' '.$updated_by2.' ('.$updated_by3.')';


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
 
        $cin = $request->input('cin');
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);      
        $programmes_id = Programme::where('sigle',$request->input('programme'))->first()->id;

        if ($request->input('sexe') == "M") {
            $civilite = "M.";
        }elseif ($request->input('sexe') == "F") {
            $civilite = "Mme";
        }else {
            $civilite = "";
        }

        $programme_id = Programme::where('sigle',$request->input('programme'))->first()->id;
        $diplome_id = Diplome::where('name',$request->input('diplome'))->first()->id;
        $departement_id = Departement::where('nom',$request->input('departement'))->first()->id;

        $cin = $request->input('cin');
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);
        $cin = str_replace(' ', '', $cin);         

        $utilisateur->sexe                      =      $request->input('sexe');
        $utilisateur->civilite                  =      $civilite;
        $utilisateur->firstname                 =      $request->input('prenom');
        $utilisateur->name                      =      $request->input('nom');
        $utilisateur->email                     =      $request->input('email');
        $utilisateur->username                  =      $request->input('username');
        $utilisateur->telephone                 =      $telephone;
        $utilisateur->fixe                      =      $fixe;
        $utilisateur->bp                        =      $request->input('bp');
        $utilisateur->fax                       =      $request->input('fax');
        $utilisateur->situation_familiale       =      $request->input('familiale');
        $utilisateur->situation_professionnelle =      $request->input('professionnelle');
        $utilisateur->date_naissance            =      $request->input('date_naiss');
        $utilisateur->lieu_naissance            =      $request->input('lieu_naissance');
        $utilisateur->adresse                   =      $request->input('adresse');
        $utilisateur->password                  =      Hash::make($request->input('email'));
        $utilisateur->roles_id                  =      $utilisateurs->role->id;
        $utilisateurs->updated_by               =      $updated_by;

        $utilisateur->save();

        $demandeur->numero                      =      $request->input('numero');
        $demandeur->numero_courrier             =      $request->input('numero_courrier');
        $demandeur->date_depot                  =      $request->input('date_depot');
        $demandeur->nbre_piece                  =      $request->input('nombre_de_piece');
        $demandeur->niveau_etude                =      $request->input('niveau_etude');
        $demandeur->etablissement               =      $request->input('etablissement');
        $demandeur->telephone                   =      $autre_tel;
        $demandeur->fixe                        =      $fixe;
        $demandeur->statut                      =      $request->input('statut');
        $demandeur->option                      =      $request->input('option');
        $demandeur->adresse                     =      $request->input('adresse');
        $demandeur->motivation                  =      $request->input('motivation');
        $demandeur->autres_diplomes             =      $request->input('autres_diplomes');
        $demandeur->experience                  =      $request->input('experience');
        $demandeur->qualification               =      $request->input('qualification');
        $demandeur->departements_id             =      $departement_id;
        $demandeur->programmes_id               =      $programme_id;
        $demandeur->diplomes_id                 =      $diplome_id;
        $demandeur->users_id                    =      $utilisateur->id;

        $demandeur->save();

        $individuelle->cin                      =     $cin;
        $individuelle->experience               =     $request->input('experience');
        $individuelle->information              =     $request->input('information');
        $individuelle->nbre_pieces              =     $request->input('nombre_de_piece');
        $individuelle->information              =     $request->input('information');
        $individuelle->prerequis                =     $request->input('prerequis');
        $individuelle->demandeurs_id            =     $demandeur->id;

        $individuelle->save();

        $demandeur->modules()->sync($request->input('modules'));
        
        return redirect()->route('individuelles.index')->with('success','demande modifiée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Individuelle  $individuelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Individuelle $individuelle)
    {
        
        $this->authorize('delete',  $individuelle->demandeur->user);

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
