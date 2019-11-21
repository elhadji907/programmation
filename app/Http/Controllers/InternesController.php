<?php

namespace App\Http\Controllers;

use App\Interne;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class InternesController extends Controller
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
       $courriers = \App\Courrier::get()->count();

        return view('internes.index',compact('courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
       $courriers = \App\Courrier::get()->count();

        $types = TypesCourrier::get();
        return view('internes.create', compact('types','courriers', 'recues', 'internes', 'departs'));
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
     * @param  \App\Interne  $interne
     * @return \Illuminate\Http\Response
     */
    public function show(Interne $interne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interne  $interne
     * @return \Illuminate\Http\Response
     */
    public function edit(Interne $interne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interne  $interne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interne $interne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interne  $interne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interne $interne)
    {
        //
    }


    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $internes=Interne::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($internes)->make(true);
    }

}
