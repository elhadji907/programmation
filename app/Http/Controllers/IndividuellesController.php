<?php

namespace App\Http\Controllers;

use App\Individuelle;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Departement;
use App\Region;
use App\Diplome;
use App\Module;
use App\Programme;
use App\User;
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
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();        
        $modules = Module::distinct('name')->get()->pluck('name','id')->unique();
        $programmes = Programme::distinct('name')->get()->pluck('sigle','id')->unique();
        $diplomes = Diplome::distinct('name')->get()->pluck('name','id')->unique();
        $departements = Departement::distinct('nom')->get()->pluck('nom','id')->unique();
        $regions = Region::distinct('nom')->get()->pluck('nom','id')->unique();
        $prod = Region::all();
        //dd($regions);      
        return view('individuelles.create',compact('departements', 'diplomes', 'civilites', 'modules', 'programmes', 'regions', 'prod'));
    }

    public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Departement::select('nom','id')->where('regions_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
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
                'telephone'           =>  'required|string|max:50',
                'fixe'                =>  'required|string|max:50',
                'adresse'             =>  'required|string|max:100',
                'email'               =>  'required|email|max:255|unique:users,email',
                'numero_courrier'     =>  'required|string|unique:demandeurs,numero_courrier',
                'familiale'           =>  'required',
                'professionnelle'     =>  'required',
                'type_demande'        =>  'required',
                'niveaux'             =>  'required',
                'diplomes'            =>  'exists:diplomes,id',
                'modules'             =>  'exists:modules,id',
                'departement'         =>  'exists:departements,id',
                'region'              =>  'exists:regions,id',
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
        //
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
        //
    }
    public function list(Request $request)
    {
        $modules=Individuelle::with('demandeur.modules')->get();
        return Datatables::of($modules)->make(true);

    }
}
