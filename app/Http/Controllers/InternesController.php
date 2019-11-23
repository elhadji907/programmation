<?php

namespace App\Http\Controllers;

use App\Interne;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;
use Auth;
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
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
       $courriers = \App\Courrier::get()->count();

        return view('internes.index',compact('courriers', 'recues', 'internes', 'departs'));
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
       $courriers = \App\Courrier::get()->count();

        $types = TypesCourrier::get();
        return view('internes.create', compact('types','courriers', 'recues', 'internes', 'departs'));
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
    public function edit($id)
    {
        $recues = \App\Recue::get()->count();
        $internes = \App\Interne::get()->count();
        $departs = \App\Depart::get()->count();
        $courriers = \App\Courrier::get()->count();

         $interne = Interne::find($id);
         return view('internes.update', compact('interne','id','courriers', 'recues', 'internes', 'departs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interne  $interne
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
                'imputation'    =>  'required|string|max:50',
                'legende'       =>  'required|string|max:100',
                'file'          =>  'sometimes|required|file|max:100000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );

        if (request('file')) { 
             $filePath = request('file')->store('internes', 'public');
        $interne = Interne::find($id);
        $courrier = $interne->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Internes')->first()->id;
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
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
        $courrier->file               =      $filePath;

        $courrier->save(); 

        $interne->courriers_id        =      $courrier->id; 

        $interne->save();
         }
         else{            
        $interne = Interne::find($id);
        /*  dd($id); */
        $courrier = $interne->courrier;
        /* dd($courrier); */
 
        $types_courrier_id = TypesCourrier::where('name','Internes')->first()->id;
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
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->gestionnaires_id   =      $gestionnaire_id;
 
        $courrier->save();
 
        $interne->courriers_id        =      $courrier->id;
 
        $interne->save();
 

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
