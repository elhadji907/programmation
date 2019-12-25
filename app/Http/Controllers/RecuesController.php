<?php

namespace App\Http\Controllers;
use App\Courrier;
use App\Recue;
use App\Interne;
use App\Depart;
use App\Direction;
use Auth;
use App\Objet;
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
        $recues = Recue::all();
        $internes = Interne::get()->count();
        $departs = Depart::get()->count();
        $courriers = Courrier::all();
       
        return view('recues.index',compact('date','courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypesCourrier::get();
        // $numCourrier = date('YmdHis').rand(1,99999);
        $numCourrier = date('YmdHis');

        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $objets = Objet::pluck('name','name');
        $directions = Direction::pluck('sigle','id');

        /* dd($date); */
        
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = \App\Courrier::get()->count();

        return view('recues.create',compact('date', 'types', 'numCourrier','courriers', 'recues', 'internes', 'departs', 'objets', 'directions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
/* 
        $imputation = $request->input('imputation', array());

        dd($imputation); */


        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                /* 'imputation'    =>  'required|string|max:200', */
                'email'         =>  'required|email|max:255',
                'date'          =>  'required|date',
                'legende'       =>  'required|string|max:100',
                'file'          => 'required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );
        $types_courrier_id = TypesCourrier::where('name','Courrier arrives')->first()->id;
        $gestionnaire_id  = Auth::user()->first()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = "10000".$courrier_id;

        $direction = \App\Direction::first();
        $courrier = \App\Courrier::first();
        
       
        $filePath = request('file')->store('recues', 'public');
        $courrier = new Courrier([
            'objet'              =>      $request->input('objet'),
            'expediteur'         =>      $request->input('expediteur'),
            'telephone'          =>      $request->input('telephone'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'date'               =>      $request->input('date'),
            'legende'            =>      $request->input('legende'),
            'types_courriers_id' =>      $types_courrier_id,
            'gestionnaires_id'   =>      $gestionnaire_id,
            'file'               =>      $filePath
        ]);

        $courrier->save();

        $recue = new Recue([
            'numero'        =>  "CA-".$annee."-".$numCourrier,
            'courriers_id'  =>   $courrier->id
        ]);
        
        $recue->save();
        
        $courrier->directions()->sync($request->directions);

        /* $direction->courriers()->attach($courrier); */

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
    public function edit(Recue $recue)
    {        
        $objets = Objet::pluck('name','name');
        $directions = Direction::pluck('sigle','id');
         return view('recues.update', compact('recue', 'directions', 'objets'));
        /*  dd($recue); */
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
        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date'          =>  'required|date',
                'legende'       =>  'required|string|max:100',
                'file'          =>  'sometimes|required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );

        if (request('file')) { 
             $filePath = request('file')->store('recues', 'public');
        $courrier = $recue->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Courrier arrives')->first()->id;
        $gestionnaire_id  = Auth::user()->first()->id;
 
        $courrier->objet              =      $request->input('objet');
        $courrier->expediteur         =      $request->input('expediteur');
        $courrier->telephone          =      $request->input('telephone');
        $courrier->email              =      $request->input('email');
        $courrier->adresse            =      $request->input('adresse');
        $courrier->fax                =      $request->input('fax');
        $courrier->bp                 =      $request->input('bp');
        $courrier->date               =      $request->input('date');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
        $courrier->file               =      $filePath;

        $courrier->save(); 

        $recue->courriers_id          =      $courrier->id; 

        $recue->save();
        $courrier->directions()->sync($request->input('directions'));
         }
         else{            
        /*  dd($id); */
        $courrier = $recue->courrier;
        /* dd($courrier); */
 
        $types_courrier_id = TypesCourrier::where('name','Courrier arrives')->first()->id;
        $gestionnaire_id  = Auth::user()->first()->id;
 
        $courrier->objet              =      $request->input('objet');
        $courrier->expediteur         =      $request->input('expediteur');
        $courrier->telephone          =      $request->input('telephone');
        $courrier->email              =      $request->input('email');
        $courrier->adresse            =      $request->input('adresse');
        $courrier->fax                =      $request->input('fax');
        $courrier->bp                 =      $request->input('bp');
        $courrier->date               =      $request->input('date');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
 
        $courrier->save();
 
        $recue->courriers_id          =      $courrier->id;
 
        $recue->save();
        $courrier->directions()->sync($request->input('directions'));

         }

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
        $courriers_id = $recue->courriers_id;
        $courrier = \App\Courrier::find($courriers_id);
       /*  dd($courrier); */
        // dd($recue);
        $numero = $recue->numero;
        $courrier->directions()->detach();
        $courrier->delete();
        $recue->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$numero.' a été supprimé';
        return redirect()->route('recues.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $recues=Recue::with('courrier')->get();
        return Datatables::of($recues)->make(true);
    }
}