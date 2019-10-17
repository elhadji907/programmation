<?php

namespace App\Http\Controllers;

use App\Depart;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class DepartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypesCourrier::get();
        return view('departs.create', compact('types'));
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
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function show(Depart $depart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function edit(Depart $depart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depart $depart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depart $depart)
    {
        //
    }

    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $departs=Depart::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($departs)->make(true);
    }

}
