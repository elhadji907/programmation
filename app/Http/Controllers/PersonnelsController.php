<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\User;
use App\Role;
use App\Objet;
use App\Direction;
use App\Courrier;
use App\Categorie;
use App\Fonction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Intervention\Image\Facades\Image;

use App\Charts\Courrierchart;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Gestionnaire');
    }
    public function index()
    {
        $date = Carbon::today()->locale('fr_FR');
        $date = $date->copy()->addDays(0);
        $date = $date->isoFormat('LLLL'); // M/D/Y
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::all();
        $departs = \App\Depart::all();
       $courriers = \App\Courrier::get()->count();
        $chart      = Courrier::all();

        $chart = new Courrierchart;
        $chart->labels(['Départs', 'Arrivés', 'Internes']);
        $chart->dataset('STATISTIQUES', 'bar', [$internes, $recues, $departs])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        return view('personnels.index', compact('chart'));
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
        $objets = Objet::distinct('name')->pluck('name','id');
        $directions = Direction::pluck('sigle','id');
        $categories = Categorie::pluck('name','id');
        $fonctions = Fonction::pluck('name','id');

        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        return view('personnels.create',compact('roles', 'civilites','objets','directions','categories','fonctions', 'chart'));
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
                'civilite'      =>  'required|string|max:10',
                'direction'     =>  'required|string|max:10',
                'matricule'     =>  'required|string|max:50',
                'categorie'     =>  'required|string|max:50',
                'firstname'     =>  'required|string|max:50',
                'fonction'      =>  'required|string|max:50',
                'name'          =>  'required|string|max:50',
                'username'      =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'cin'           =>  'required|string|min:12|max:15',
                'familiale'     =>  'required|string',
                'enfant'        =>  'required|int',
                'date_naiss'    =>  'required|date',
                'date_debut'    =>  'required|date',
                'lieu'          =>  'required|string',
            ]
        );   

        $roles_id = Role::where('name','Administrateur')->first()->id;
        $utilisateur = new User([      
            'civilite'              =>      $request->input('civilite'),      
            'firstname'             =>      $request->input('firstname'),
            'name'                  =>      $request->input('name'),
            'username'              =>      $request->input('username'),
            'date_naissance'        =>      $request->input('date_naiss'),
            'lieu_naissance'        =>      $request->input('lieu'),
            'situation_familiale'   =>      $request->input('familiale'),
            'email'                 =>      $request->input('email'),
            'telephone'             =>      $request->input('telephone'),
            'password'              =>      Hash::make($request->input('password')),
            'roles_id'              =>      $roles_id
        ]);
        $utilisateur->save();

        $date = Carbon::createFromFormat('Y-m-d', $request->input('date_naiss'));
        $fin = $date->addYears(60);

        $personnel = new Personnel([
            'matricule'     =>     $request->input('matricule'),
            'cin'           =>     $request->input('cin'),
            'debut'         =>     $request->input('date_debut'),
            'fin'           =>     $fin,
            'nbrefant'      =>     $request->input('enfant'),
            'users_id'      =>     $utilisateur->id,
            'categories_id' =>     $request->input('categorie'),
            'directions_id' =>     $request->input('direction'),
            'fonctions_id'  =>     $request->input('fonction')
        ]);
        
        $personnel->save();
        return redirect()->route('personnels.index')->with('success','personnel ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        
        return view('personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
        $objets = Objet::distinct('name')->pluck('name','name');
        $directions = Direction::pluck('name','name');
        $categories = Categorie::pluck('name','name');
        $fonctions = Fonction::pluck('name','name');

        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        return view('personnels.update', compact('personnel', 'objets', 'directions', 'civilites', 'categories', 'fonctions', 'chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {        
        $data = request()->validate([
                'civilite'      =>  'required|string|max:10',
                'direction'     =>  'required|string',
                'matricule'     =>  'required|string|max:15',
                'categorie'     =>  'required|string|max:50',
                'firstname'     =>  'required|string|max:50',
                'fonction'      =>  'required|string',
                'name'          =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'cin'           =>  'required|string|min:12|max:15',
                'familiale'     =>  'required|string',
                'enfant'        =>  'required|int',
                'date_naiss'    =>  'required|date',
                'date_debut'    =>  'required|date',
                'lieu'          =>  'required|string',
                'image'         =>  'sometimes|image|max:3000',
            ]
        );
        
        $user = $personnel->user;

        $direction=$request->input('direction');
        $directions_id = Direction::where('name', $direction)->first()->id;

        $fonction=$request->input('fonction');
        $fonctions_id = Fonction::where('name', $fonction)->first()->id;

        $categorie=$request->input('categorie');
        $categories_id = Categorie::where('name', $categorie)->first()->id;

        $roles_id = Role::where('name','Administrateur')->first()->id;

        $date = Carbon::createFromFormat('Y-m-d', $request->input('date_naiss'));
        $fin = $date->addYears(60);
        
        if (request('image')) {
            $imagePath = request('image')->store('avatars', 'public');
    
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800, 800);
            $image->save();
    
                $user->profile->update([
                'image' => $imagePath
                ]);
    
                $user->update([
                'civilite' => $data['civilite'],
                'firstname' => $data['firstname'],
                'name' => $data['name'],
                'date_naissance' => $data['date_naiss'],
                'lieu_naissance' => $data['lieu'],
                'situation_familiale' => $data['familiale'],
                'telephone' => $data['telephone'],
                'roles_id' => $roles_id,

                ]);
                $personnel->update([
                'matricule'         =>      $data['matricule'],
                'cin'               =>      $data['cin'],
                'debut'             =>      $data['date_debut'],
                'fin'               =>      $fin,
                'nbrefant'          =>      $data['enfant'],
                'directions_id'     =>      $directions_id,
                'fonctions_id'      =>      $fonctions_id,
                'categories_id'     =>      $categories_id,
                'roles_id'          =>      $roles_id,

                ]);
    
            }  else {
                $user->profile->update($data);

                  $user->update([
                'civilite' => $data['civilite'],
                'firstname' => $data['firstname'],
                'name' => $data['name'],
                'date_naissance' => $data['date_naiss'],
                'lieu_naissance' => $data['lieu'],
                'situation_familiale' => $data['familiale'],
                'telephone' => $data['telephone'],
                'roles_id' => $roles_id,

                ]);
                $personnel->update([
                'matricule'         =>      $data['matricule'],
                'cin'               =>      $data['cin'],
                'debut'             =>      $data['date_debut'],
                'fin'               =>      $fin,
                'nbrefant'          =>      $data['enfant'],
                'directions_id'     =>      $directions_id,
                'fonctions_id'      =>      $fonctions_id,
                'categories_id'     =>      $categories_id,
                'roles_id'          =>      $roles_id,

                ]);
            }

/* 
        $user->civilite              =      $request->input('civilite');
        $user->firstname             =      $request->input('firstname');
        $user->name                  =      $request->input('name');
        $user->date_naissance        =      $request->input('date_naiss');
        $user->lieu_naissance        =      $request->input('lieu');
        $user->situation_familiale   =      $request->input('familiale');
        $user->telephone             =      $request->input('telephone');
        $user->roles_id              =      $roles_id;

        $user->save();

        $date = Carbon::createFromFormat('Y-m-d', $request->input('date_naiss'));
        $fin = $date->addYears(50);

        $personnel->matricule       =      $request->input('matricule');
        $personnel->cin             =      $request->input('cin');
        $personnel->debut           =      $request->input('date_debut');
        $personnel->fin             =      $fin;
        $personnel->nbrefant        =      $request->input('enfant');
        $personnel->directions_id   =      $directions_id;
        $personnel->fonctions_id    =      $fonctions_id;
        $personnel->categories_id   =      $categories_id;
        $personnel->users_id        =      $personnel->id;
        
        $personnel->save(); */


        $success = $personnel->user->firstname.' '.$personnel->user->name.' a été modifié(e) avec succès';
        return redirect()->route('personnels.index')->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->user->delete();
        $personnel->delete();
        $message = $personnel->user->firstname.' '.$personnel->user->name.' a été supprimé(e)';
        return redirect()->route('personnels.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $personnels=Personnel::with('user.personnel.fonction')->get();
        return Datatables::of($personnels)->make(true);
    }
}
