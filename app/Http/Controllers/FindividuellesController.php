<?php

namespace App\Http\Controllers;

use App\Findividuelle;
use Illuminate\Http\Request;

class FindividuellesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $findividuelles = Findividuelle::all();

       /*  dd($findividuelles); */

        return view('findividuelles.index', compact('findividuelles'));
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
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function show(Findividuelle $findividuelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function edit(Findividuelle $findividuelle)
    {
        dd($findividuelle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Findividuelle $findividuelle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Findividuelle  $findividuelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Findividuelle $findividuelle)
    {
        //
    }
}
