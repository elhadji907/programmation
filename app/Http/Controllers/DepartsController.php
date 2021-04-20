<?php

namespace App\Http\Controllers;

use App\Depart;
use Illuminate\Http\Request;
use App\TypesCourrier;
use Yajra\Datatables\Datatables;
use App\Direction;
use Auth;
use App\Courrier;
use App\Charts\Courrierchart;

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class DepartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:Administrateur|Gestionnaire|Courrier');
    }
    public function index()
    {
       $date = Carbon::today()->locale('fr_FR');
       $date = $date->copy()->addDays(0);
       $date = $date->isoFormat('LLLL'); // M/D/Y
       $recues = \App\Recue::get()->count();
       $internes = \App\Interne::get()->count();
       $departs = \App\Depart::all();
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
        $types = TypesCourrier::get();
        // $numCourrier = date('YmdHis').rand(1,99999);
        $numCourrier = date('YmdHis');

        $date = Carbon::parse('now');
        $date = $date->format('Y-m-d');

        $directions = Direction::pluck('sigle','id');

        /* dd($date); */      
        $date_r = Carbon::now();
       
        return view('departs.create', compact('numCourrier', 'date', 'directions', 'date_r'));
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
                'message'       =>  'required|string|max:255',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
                'date_c'        =>  'required|date',
            ]
        );
        $types_courrier_id = TypesCourrier::where('name','Courriers departs')->first()->id;
        $user_id  = Auth::user()->id;
        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = $courrier_id;

        $direction = \App\Direction::first();
        $courrier = \App\Courrier::first();
        // $filePath = request('file')->store('recues', 'public');
        $courrier = new Courrier([
            'numero'             =>     "CD-".$annee."-".$numCourrier,
            'objet'              =>      $request->input('objet'),
            'message'            =>      $request->input('message'),
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
            'users_id'   =>      $user_id,
            'file'               =>      ""
        ]);

        $courrier->save();

        $depart = new Depart([
            'numero'        =>  "CD-".$annee."-".$numCourrier,
            'courriers_id'  =>   $courrier->id
        ]);
        
        $depart->save();
        
        $courrier->directions()->sync($request->directions);
        
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
    public function edit(Depart $depart)
    {
        
        $this->authorize('update',  $depart->courrier);

        $directions = Direction::pluck('sigle','id');

         return view('departs.update', compact('depart', 'directions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depart $depart)
    {

        $this->authorize('update',  $depart->courrier);

        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:100',
                'message'       =>  'required|string|max:255',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_r'        =>  'required|date',
                'date_c'        =>  'required|date',
                'file'          =>  'sometimes|required|file|max:30000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp',

            ]
        );

       
        if (request('file')) { 
            $filePath = request('file')->store('departs', 'public');
       $courrier = $depart->courrier; 
       $types_courrier_id = TypesCourrier::where('name','Courriers departs')->first()->id;
       $user_id  = Auth::user()->id;

       $courrier->objet              =      $request->input('objet');
       $courrier->message            =      $request->input('message');
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
       $courrier->users_id           =      $user_id;
       $courrier->file               =      $filePath;

       $courrier->save(); 

       $depart->courriers_id          =      $courrier->id; 

       $depart->save();
       $courrier->directions()->sync($request->input('directions'));
        }
         else{   
            $courrier = $depart->courrier;
            $types_courrier_id = TypesCourrier::where('name','Courriers departs')->first()->id;
            $user_id  = Auth::user()->id;
     
            $courrier->objet              =      $request->input('objet');
            $courrier->message            =      $request->input('message');
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
            $courrier->users_id   =      $user_id;
     
            $courrier->save();
     
            $depart->courriers_id          =      $courrier->id;
     
            $depart->save();
            $courrier->directions()->sync($request->input('directions'));
 

         }

       return redirect()->route('courriers.show', $depart->courrier->id)->with('success','courrier modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Depart  $depart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depart $depart)
    {

        $this->authorize('delete',  $depart->courrier);

        $depart->courrier->directions()->detach();
        $depart->courrier->delete();
        $depart->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$depart->numero.' a été supprimé';
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
