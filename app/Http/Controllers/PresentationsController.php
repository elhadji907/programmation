<?php

namespace App\Http\Controllers;

use App\Courrier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PresentationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = $recues + $internes + $departs;
        
        return view('presentations.index', compact('courriers', 'recues', 'internes', 'departs'));
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
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(Courrier $courrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courrier $courrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courrier $courrier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courrier $courrier)
    {
        //
    }    
    public function list(Request $request)
    {
        $courriers=Courrier::with('types_courrier')->get();
        return Datatables::of($courriers)->make(true);
    }
}
