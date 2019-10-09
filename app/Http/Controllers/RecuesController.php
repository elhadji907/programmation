<?php

namespace App\Http\Controllers;

use App\Recue;
use Illuminate\Http\Request;

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
        //
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

        return view('courriers.arrives.create',compact('types', 'numCourrier'));
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

        return view('courriers.arrives.show',compact('types'));
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
}
