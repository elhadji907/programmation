<?php

namespace App\Http\Controllers;

use App\Interne;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;
use Auth;
use App\Courrier;
use App\Objet;
use App\Direction;
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
        $date = Carbon::today()->locale('fr_FR');
        $date = $date->copy()->addDays(0);
        $date = $date->isoFormat('LLLL'); // M/D/Y
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::all();
        $departs = \App\Depart::all();
       $courriers = \App\Courrier::get()->count();
        
        return view('internes.index',compact('date','courriers', 'recues', 'internes', 'departs'));
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
        $date_r = Carbon::now();

       /*  dd($date_r); */

        return view('internes.create', compact('numCourrier','courriers', 'date', 'objets', 'directions', 'date_r' ));
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
                'date_c'        =>  'required|date',
            ]
        );
        $types_courrier_id = TypesCourrier::where('name','Courrier internes')->first()->id;
        $gestionnaire_id  = Auth::user()->first()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = $courrier_id;

        $direction = \App\Direction::first();
        $courrier = \App\Courrier::first();
        // $filePath = request('file')->store('recues', 'public');
        $courrier = new Courrier([
            'objet'              =>      $request->input('objet'),
            'expediteur'         =>      $request->input('expediteur'),
            'telephone'          =>      $request->input('telephone'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'date_r'             =>      $request->input('date_r'),
            'date_c'             =>      $request->input('date_c'),
            // 'legende'            =>      $request->input('legende'),
            'types_courriers_id' =>      $types_courrier_id,
            'gestionnaires_id'   =>      $gestionnaire_id,
            'file'               =>      ""
        ]);

        $courrier->save();

        $interne = new Interne([
            'numero'        =>  "CD-".$annee."-".$numCourrier,
            'courriers_id'  =>   $courrier->id
        ]);
        
        $interne->save();
        
        $courrier->directions()->sync($request->directions);
        
        return redirect()->route('internes.index')->with('success','courrier ajouté avec succès !');
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
        $objets = Objet::pluck('name','name');
        $directions = Direction::pluck('sigle','id');
         return view('internes.update', compact('interne', 'directions', 'objets'));
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
        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
                'date_c'        =>  'required|date',
                'file'          =>  'sometimes|required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );

       
        if (request('file')) { 
            $filePath = request('file')->store('internes', 'public');
       $courrier = $interne->courrier; 
       $types_courrier_id = TypesCourrier::where('name','Courrier internes')->first()->id;
       $gestionnaire_id  = Auth::user()->first()->id;

       $courrier->objet              =      $request->input('objet');
       $courrier->expediteur         =      $request->input('expediteur');
       $courrier->telephone          =      $request->input('telephone');
       $courrier->email              =      $request->input('email');
       $courrier->adresse            =      $request->input('adresse');
       $courrier->fax                =      $request->input('fax');
       $courrier->bp                 =      $request->input('bp');
       $courrier->date_r             =      $request->input('date_r');
       $courrier->date_c             =      $request->input('date_c');
       $courrier->legende            =      $request->input('legende');
       $courrier->types_courriers_id =      $types_courrier_id;
       $courrier->gestionnaires_id   =      $gestionnaire_id;
       $courrier->file               =      $filePath;

       $courrier->save(); 

       $interne->courriers_id          =      $courrier->id; 

       $interne->save();
       $courrier->directions()->sync($request->input('directions'));
        }
         else{   
            $courrier = $interne->courrier;
            $types_courrier_id = TypesCourrier::where('name','Courrier internes')->first()->id;
            $gestionnaire_id  = Auth::user()->first()->id;
     
            $courrier->objet              =      $request->input('objet');
            $courrier->expediteur         =      $request->input('expediteur');
            $courrier->telephone          =      $request->input('telephone');
            $courrier->email              =      $request->input('email');
            $courrier->adresse            =      $request->input('adresse');
            $courrier->fax                =      $request->input('fax');
            $courrier->bp                 =      $request->input('bp');
            $courrier->date_r             =      $request->input('date_r');
            $courrier->date_c             =      $request->input('date_c');
            $courrier->legende            =      $request->input('legende');
            $courrier->types_courriers_id =      $types_courrier_id;
            $courrier->gestionnaires_id   =      $gestionnaire_id;
     
            $courrier->save();
     
            $interne->courriers_id          =      $courrier->id;
     
            $interne->save();
            $courrier->directions()->sync($request->input('directions'));
 

         }

       return redirect()->route('internes.index')->with('success','courrier modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interne  $interne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interne $interne)
    {
        $courriers_id = $interne->courriers_id;
        $courrier = \App\Courrier::find($courriers_id);
        $numero = $interne->courrier->numero;

        $courrier->delete();
        $interne->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$numero.' a été supprimé';
        return redirect()->route('internes.index')->with(compact('message'));
    }


    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $internes=Interne::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($internes)->make(true);
    }

}
