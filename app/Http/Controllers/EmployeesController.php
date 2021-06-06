<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Objet;
use App\Direction;
use App\Courrier;
use App\Category;
use App\Fonction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Intervention\Image\Facades\Image;

use App\Charts\Courrierchart;

class EmployeesController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $employees = Employee::all();

        return view('employees.index', compact('chart', 'employees'));

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
        $directions = Direction::pluck('sigle','id');
        $categories = Category::pluck('name','id');
        $fonctions = Fonction::pluck('name','id');

        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        return view('employees.create',compact('roles', 'civilites','directions','categories','fonctions', 'chart'));

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
                'matricule'     =>  'required|string|max:50',
                'categorie'     =>  'required|string|max:50',
                'firstname'     =>  'required|string|max:50',
                'fonction'      =>  'required|string',
                'name'          =>  'required|string|max:50',
                'username'      =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'cin'           =>  'required|string|min:12|max:15',
                'adresse'       =>  'string',
                'familiale'     =>  'required|string',
                'date_naiss'    =>  'required|date',
                'date_embauche' =>  'required|date',
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
            'adresse'               =>      $request->input('adresse'),
            'email'                 =>      $request->input('email'),
            'telephone'             =>      $request->input('telephone'),
            'password'              =>      Hash::make($request->input('password')),
            'roles_id'              =>      $roles_id
        ]);
        
        $utilisateur->save();

        $date = Carbon::createFromFormat('Y-m-d', $request->input('date_naiss'));
        $fin = $date->addYears(60);

        $employee = new Employee([
            'matricule'     =>     $request->input('matricule'),
            'cin'           =>     $request->input('cin'),
            'date_embauche' =>     $request->input('date_embauche'),
            'fin'           =>     $fin,
            'users_id'      =>     $utilisateur->id,
            'categories_id' =>     $request->input('categorie'),
            'directions_id' =>     $request->input('direction'),
            'fonctions_id'  =>     $request->input('fonction')
        ]);
        
        $employee->save();
        return redirect()->route('employees.index')->with('success','employee ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
        $directions = Direction::pluck('name','name');
        $categories = Category::pluck('name','name');
        $fonctions = Fonction::pluck('sigle','sigle');

        //dd($employee);

        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        return view('employees.update', compact('employee', 'objets', 'directions', 'civilites', 'categories', 'fonctions', 'chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
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
                'adresse'       =>  'string',
                'date_naiss'    =>  'required|date',
                'date_embauche' =>  'required|date',
                'lieu'          =>  'required|string',
                'bp'            =>  'string',
                'fax'           =>  'string',
                'image'         =>  'sometimes|image|max:3000',
            ]
        );

        $user = $employee->user;

        $direction=$request->input('direction');
        $directions_id = Direction::where('name', $direction)->first()->id;

        $fonction=$request->input('fonction');
        $fonctions_id = Fonction::where('sigle', $fonction)->first()->id;

        $categorie=$request->input('categorie');
        $categories_id = Category::where('name', $categorie)->first()->id;

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
                'adresse' => $data['adresse'],
                'telephone' => $data['telephone'],
                'bp' => $data['bp'],
                'fax' => $data['fax'],
                'roles_id' => $roles_id,

                ]);
                
                $employee->update([
                'matricule'         =>      $data['matricule'],
                'cin'               =>      $data['cin'],
                'date_embauche'     =>      $data['date_embauche'],
                'fin'               =>      $fin,
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
                'adresse' => $data['adresse'],            
                'bp' => $data['bp'],
                'fax' => $data['fax'],
                'telephone' => $data['telephone'],
                'roles_id' => $roles_id,

                ]);


                $employee->update([
                'matricule'         =>      $data['matricule'],
                'cin'               =>      $data['cin'],
                'date_embauche'     =>      $data['date_embauche'],
                'fin'               =>      $fin,
                'directions_id'     =>      $directions_id,
                'fonctions_id'      =>      $fonctions_id,
                'categories_id'     =>      $categories_id,
                'roles_id'          =>      $roles_id,

                ]);
            }

        $success = $employee->user->firstname.' '.$employee->user->name.' a été modifié(e) avec succès';
        return redirect()->route('employees.index')->with(compact('success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    
    public function list(Request $request)
    {
        $employees=Employee::with('user.employee.fonction')->get();
        return Datatables::of($employees)->make(true);
    }
}
