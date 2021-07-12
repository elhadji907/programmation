<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();

        /* dd($formations); */
        
        $findividuelles = \App\Findividuelle::get()->count();
        $fcollectives = \App\Fcollective::get()->count();

        $all_formations = Formation::get()->count();

        return view('formations.index', compact('formations','findividuelles','fcollectives','all_formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        $type_formation = $formation->types_formation->name;
        $findividuelles = $formation->findividuelles;
        $fcollectives = $formation->fcollectives;

        if ($type_formation == "Individuelle") {
            return view('findividuelles.details', compact('formation','findividuelles'));
        } elseif ($type_formation == "Collective") {
            return view('fcollectives.details', compact('formation','fcollectives'));
        } else {
            return view('formations.show', compact('formation'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        $type_formation = $formation->types_formation->name;
        $findividuelles = $formation->formations_individuelles;
        $fcollectives = $formation->formations_collectives;

        if ($type_formation == "Individuelle") {
            $findividuelles->delete();
        } elseif ($type_formation == "Collective") {
            $fcollectives->delete();
        } else {
            $formation->delete();
        }

        $formation->delete();

        $message = $type_formation.' a été supprimé(e)';
        return back()->with(compact('message'));

    }
}
