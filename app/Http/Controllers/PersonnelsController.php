<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\User;
use App\Role;
use App\Objet;
use App\Direction;
use App\Categorie;
use App\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personnels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $civilites = User::distinct('civilite')->get()->pluck('civilite','id')->unique();
        $objets = Objet::distinct('name')->pluck('name','id');
        $directions = Direction::pluck('sigle','id');
        $categories = Categorie::pluck('name','id');
        $fonctions = Fonction::pluck('name','id');
        return view('personnels.create',compact('roles', 'civilites','objets','directions','categories','fonctions'));
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
                'direction'     =>  'required|string|max:10',
                'matricule'     =>  'required|string|max:50',
                'categorie'     =>  'required|string|max:50',
                'fistname'        =>  'required|string|max:50',
                'fonction'        =>  'required|string|max:50',
                'name'           =>  'required|string|max:50',
                'username'           =>  'required|string|max:50',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255|unique:users,email',
                'cin'         =>   'required|string|max:50',
                'familiale'         =>  'required|string|max:50',
                'enfant'         =>   'required|int|max:50',
                'date'         =>  'date',
                'lieu'         =>   'required|string|max:50',
                'fax'         =>   'required|string|max:50',
                'bp'         =>   'required|string|max:50',
                'file'         =>   'required|string|max:50',
                'legende'         =>   'required|string|max:50',
                'password'      =>  'required|confirmed|string|min:8|max:50',
            ]
        );
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personnel $personnel)
    {
        //
    }

    public function list(Request $request)
    {
        $personnels=Personnel::with('user.personnel.fonction')->get();
        return Datatables::of($personnels)->make(true);
    }
}
