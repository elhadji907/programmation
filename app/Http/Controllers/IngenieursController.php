<?php

namespace App\Http\Controllers;

use App\Ingenieur;
use App\Formation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class IngenieursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingenieurs = Ingenieur::all();

        return view('ingenieurs.index', compact('ingenieurs'));
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
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function show(Ingenieur $ingenieur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingenieur $ingenieur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingenieur $ingenieur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingenieur  $ingenieur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingenieur $ingenieur)
    {
        //
    }

    public function list(Request $request)
    {
        $ingenieurs=Ingenieur::withCount('formations')->get();
        return Datatables::of($ingenieurs)->make(true);
    }
}
