<?php

namespace App\Http\Controllers;

use App\Depart;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;
use Auth;
use App\Courrier;

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
        $date = Carbon::today()->locale('fr_FR');
        $date = $date->copy()->addDays(0);
        $date = $date->isoFormat('LLLL'); // M/D/Y
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
       $courriers = \App\Courrier::get()->count();
        
        return view('departs.index',compact('date','courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numCourrier = date('YmdHis');

        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = \App\Courrier::get()->count();

        return view('departs.create', compact('numCourrier','courriers', 'recues', 'internes', 'departs'));
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
                'legende'       =>  'required|string|max:100',
                'file'          => 'required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );
        $types_courrier_id = TypesCourrier::where('name','Departs')->first()->id;
        $gestionnaire_id  = Auth::user()->gestionnaire()->first()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = "10000".$courrier_id;

        $direction = \App\Direction::first();
        $courrier = \App\Courrier::first();
       
        $filePath = request('file')->store('departs', 'public');
        $courrier = new Courrier([
            'numero'             =>      "CD-".$annee."-".$numCourrier,
            'objet'              =>      $request->input('objet'),
            'expediteur'         =>      $request->input('expediteur'),
            'telephone'          =>      $request->input('telephone'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'date'               =>      $request->input('date_r'),
            'legende'            =>      $request->input('legende'),
            'types_courriers_id' =>      $types_courrier_id,
            'gestionnaires_id'   =>      $gestionnaire_id,
            'file'               =>      $filePath
        ]);

        $courrier->save();

        $depart = new Depart([
            'courriers_id'  =>   $courrier->id
        ]);
        
        $depart->save();
        $direction->courriers()->attach($courrier);

        return redirect()->route('departs.index')->with('success','courrier ajouté avec succès !');

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
    public function edit($id)
    {
          
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = \App\Courrier::get()->count();

         $depart = Depart::find($id);
         
         return view('departs.update', compact('depart','id','courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
                'legende'       =>  'required|string|max:100',
                'file'          =>  'sometimes|required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );

        if (request('file')) { 
             $filePath = request('file')->store('departs', 'public');
        $depart = Depart::find($id);
        $courrier = $depart->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Arrives')->first()->id;
        $gestionnaire_id  = Auth::user()->gestionnaire()->first()->id;
 
        $courrier->objet              =      $request->input('objet');
        $courrier->expediteur         =      $request->input('expediteur');
        $courrier->telephone          =      $request->input('telephone');
        $courrier->email              =      $request->input('email');
        $courrier->adresse            =      $request->input('adresse');
        $courrier->fax                =      $request->input('fax');
        $courrier->bp                 =      $request->input('bp');
        $courrier->date               =      $request->input('date_r');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
        $courrier->file               =      $filePath;

        $courrier->save(); 

        $depart->courriers_id          =      $courrier->id; 

        $depart->save();
         }
         else{            
        $depart = Depart::find($id);
        /*  dd($id); */
        $courrier = $depart->courrier;
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
        $courrier->date               =      $request->input('date_r');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
 
        $courrier->save();
 
        $depart->courriers_id          =      $courrier->id;
 
        $depart->save();
 

         }

       return redirect()->route('departs.index')->with('success','courrier modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depart $depart)
    {
        $courriers_id = $depart->courriers_id;
        $courrier = \App\Courrier::find($courriers_id);
       /*  dd($courrier); */
        // dd($depart);
        $numero = $depart->courrier->numero;

        $courrier->delete();
        $depart->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$numero.' a été supprimé';
        return redirect()->route('departs.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $date = Carbon::today();
        $date = $date->copy()->addDays(-7);

        $departs=Depart::with('courrier')->where('created_at', '>=', $date)->get();
        return Datatables::of($departs)->make(true);
    }

}
