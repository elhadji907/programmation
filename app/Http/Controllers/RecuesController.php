<?php

namespace App\Http\Controllers;
use App\Courrier;
use App\Recue;
use Auth;
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
        
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = $recues + $internes + $departs;

        return view('recues.index',compact('date','courriers', 'recues', 'internes', 'departs'));
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
        $courriers = $recues + $internes + $departs;
        $types = TypesCourrier::get();
        // $numCourrier = date('mdHis').rand(1,99999);
        $numCourrier = date('YmdHis');

        return view('recues.create',compact('types', 'numCourrier','courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
            ]
        );


        $types_courrier_id = TypesCourrier::where('name','Arrives')->first()->id;
        $gestionnaire_id  = Auth::user()->gestionnaire()->first()->id;

        $courrier_id = Courrier::get()->last()->id;

        // dd($courrier_id);

        $annee = date('Y');

        $numCourrier = "10000".$courrier_id;

       /*  dd($types_courrier_id); */
        /* dd($gestionnaire_id); */

        $courrier = new Courrier([

            'numero'             =>      "CA-".$annee."-".$numCourrier,
            'objet'              =>      $request->input('objet'),
            'expediteur'         =>      $request->input('expediteur'),
            'telephone'          =>      $request->input('telephone'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'imputation'         =>      $request->input('imputation'),
            'date'               =>      $request->input('date'),
            'types_courriers_id' =>      $types_courrier_id,
            'gestionnaires_id'   =>      $gestionnaire_id

        ]);

        $courrier->save();

        $recue = new Recue([
            'courriers_id'  =>   $courrier->id
        ]);
        
        $recue->save();

        return redirect()->route('recues.index')->with('success','courrier ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function show(Recue $recue)
    {
       //        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $recue = Recue::find($id);
         return view('recues.update', compact('recue','id'));
         dd($recue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
                'imputation'    =>  'required|string|max:50',
            ]
        );

        $recue = Recue::find($id);
       /*  dd($id); */
       $courrier = $recue->courrier;
       /* dd($courrier); */

       $types_courrier_id = TypesCourrier::where('name','Arrives')->first()->id;
       $gestionnaire_id  = Auth::user()->gestionnaire()->first()->id;

       $courrier->objet              =      $request->input('objet');
       $courrier->expediteur         =      $request->input('expediteur');
       $courrier->telephone          =      $request->input('telephone');
       $courrier->email              =      $request->input('email');
       $courrier->adresse            =      $request->input('adresse');
       $courrier->fax                =      $request->input('fax');
       $courrier->bp                 =      $request->input('bp');
       $courrier->imputation         =      $request->input('imputation');
       $courrier->date               =      $request->input('date_r');
       $courrier->types_courriers_id =      $types_courrier_id;
       $courrier->gestionnaires_id   =      $gestionnaire_id;

       $courrier->save();

       $recue->courriers_id          =      $courrier->id;

       $recue->save();

       return redirect()->route('recues.index')->with('success','courrier modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recue $recue)
    {
        $recue->delete();
        $message = "Le courrier enregistré sous le numéro ".$recue->courrier->numero.' a été supprimé';
        return redirect()->route('recues.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $recues=Recue::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($recues)->make(true);
    }
}
