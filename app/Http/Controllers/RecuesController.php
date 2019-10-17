<?php

namespace App\Http\Controllers;

use App\Recue;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

use App\TypesCourrier;

class RecuesController extends Controller
{
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
        return view('recues.index',compact('date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypesCourrier::get();
        // $numCourrier = date('mdHis').rand(1,99999);
        $numCourrier = date('YmdHis');

        return view('recues.create',compact('types', 'numCourrier'));
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
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function show(Recue $recue)
    {
        $types = TypesCourrier::get();
        // $numCourrier = date('mdHis').rand(1,99999);
        //$numCourrier = date('YmdHis');

        return view('recues.show',compact('types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function edit(Recue $recue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recue $recue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recue $recue)
    {
        //
    }

    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $recues=Recue::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($recues)->make(true);
    }
}
