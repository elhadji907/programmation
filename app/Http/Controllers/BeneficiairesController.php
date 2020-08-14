<?php

namespace App\Http\Controllers;

use App\Beneficiaire;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Charts\Courrierchart;

class BeneficiairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Beneficiaire');
    }
    public function index()
    {
        return view('beneficiaires.index', compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $civilites = User::select('civilite')->distinct()->get();
        return view('beneficiaires.create',compact('roles', 'civilites'));
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
                'civilite'     =>  'required|string|max:10',
                'matricule'     =>  'required|string|max:50',
                'prenom'        =>  'required|string|max:50',
                'nom'           =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'password'      =>  'required|confirmed|string|min:8|max:50',
            ],
            [
                'password.min'  =>  'Pour des raisons de sécurité, votre mot de passe doit faire au moins :min caractères.'
            ],
            [
                'password.max'  =>  'Pour des raisons de sécurité, votre mot de passe ne doit pas dépasser :max caractères.'
            ]
        );

        $roles_id = Role::where('name','Beneficiaire')->first()->id;
        $utilisateur = new User([      
            'civilite'      =>      $request->input('civilite'),      
            'firstname'      =>      $request->input('prenom'),
            'name'           =>      $request->input('nom'),
            'email'          =>      $request->input('email'),
            'telephone'      =>      $request->input('telephone'),
            'password'       =>      Hash::make($request->input('password')),
            'roles_id'       =>      $roles_id

        ]);
        
        $utilisateur->save();
        
        $beneficiaires = new Beneficiaire([
            'matricule'     =>     $request->input('matricule'),
            'users_id'      =>     $utilisateur->id
        ]);

        $beneficiaires->save();
        return redirect()->route('beneficiairess.index')->with('success','demandeur ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiaire $beneficiaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $beneficiaire = Beneficiaire::find($id);
         $utilisateur=$beneficiaire->user;        
         $roles = Role::distinct('name')->get()->pluck('name','name')->unique();
         $civilites = User::distinct('civilite')->get()->pluck('civilite','civilite')->unique();
         return view('beneficiaires.update', compact('beneficiaire','utilisateur','id','roles','civilites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'civilite'      => 'required|string|max:10',
                'matricule'     =>  'required|string|max:50',
                'prenom'        => 'required|string|max:100',
                'nom'           => 'required|string|max:50',
                'telephone'     => 'required|string|max:50',
                'role'          => 'required|string'
            ]);

        $beneficiaire = Beneficiaire::find($id);
        $utilisateur=$beneficiaire->user;

        $utilisateur->civilite       =       $request->input('civilite');
        $utilisateur->firstname      =      $request->input('prenom');
        $utilisateur->name           =      $request->input('nom');
        $utilisateur->telephone      =      $request->input('telephone');
        $role_id = $request->input('role');
        $roles_id = Role::where('name', $role_id)->first()->id;
        $utilisateur->roles_id        =      $roles_id;

        $utilisateur->save();

        $beneficiaire->matricule   =     $request->input('matricule');
        $beneficiaire->users_id    =     $utilisateur->id;

        $beneficiaire->save();
        
        return redirect()->route('beneficiaires.index')->with('success','utilisateur modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beneficiaire  $beneficiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiaire $beneficiaire)
    {
        $beneficiaire->delete();
        $message = $beneficiaire->user->firstname.' '.$beneficiaire->user->name.' a été supprimé(e)';
        return redirect()->route('beneficiaires.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $beneficiaires=Beneficiaire::with('user')->orderBy('created_at', 'asc')->get();
        return Datatables::of($beneficiaires)->make(true);
    }
}
