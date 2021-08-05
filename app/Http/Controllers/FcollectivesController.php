<?php

namespace App\Http\Controllers;

use App\Fcollective;
use Illuminate\Http\Request;

class FcollectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fcollectives = Fcollective::all();

       /*  dd($fcollectives); */

        return view('fcollectives.index', compact('fcollectives'));
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
     * @param  \App\Fcollective  $fcollective
     * @return \Illuminate\Http\Response
     */
    public function show(Fcollective $fcollective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fcollective  $fcollective
     * @return \Illuminate\Http\Response
     */
    public function edit(Fcollective $fcollective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fcollective  $fcollective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fcollective $fcollective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fcollective  $fcollective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fcollective $fcollective)
    {
        //
    }
}
