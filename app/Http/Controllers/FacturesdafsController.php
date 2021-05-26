<?php

namespace App\Http\Controllers;

use App\Facturesdaf;
use Illuminate\Http\Request;

use Auth;

use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Courrier;
use App\Direction;
use App\Imputation;
use App\TypesCourrier;
use App\Charts\Courrierchart;

class FacturesdafsController extends Controller
{
    /**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function __construct()
{
   $this->middleware('auth');
   $this->middleware('roles:Administrateur|Gestionnaire');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::today()->locale('fr_FR');
        $date = $date->copy()->addDays(0);
        $date = $date->isoFormat('LLLL');
        $facturesdafs = Facturesdaf::all();
       
        return view('facturesdafs.index',compact('date','courriers', 'facturesdafs'));
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
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function show(Facturesdaf $facturesdaf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturesdaf $facturesdaf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturesdaf $facturesdaf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturesdaf  $facturesdaf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturesdaf $facturesdaf)
    {
        //
    }
}
