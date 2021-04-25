<?php

namespace App\Http\Controllers;
use App\Courrier;
use App\Recue;
use App\Interne;
use App\Depart;
use App\Direction;
use App\Imputation;
use Auth;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use App\Charts\Courrierchart;

use App\TypesCourrier;

class RecuesController extends Controller
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
        $recues = Recue::all();
        $internes = Interne::get()->count();
        $departs = Depart::get()->count();
        $courriers = Courrier::all();

        // $chart = new Courrierchart;
        // $chart->labels(['Départs', 'Arrivés', 'Internes']);
        // $chart->dataset('STATISTIQUES', 'bar', [$internes, $recues, $departs])->options([
        //     'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        // ]);
       
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

        $directions = Direction::pluck('sigle','id');

        $imputations = Imputation::pluck('sigle','id');

        /* dd($date); */      
        $date_r = Carbon::now();

       /*  dd($date_r); */
       $chart      = Courrier::all();
       $chart = new Courrierchart;
       $chart->labels(['', '', '']);
       $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
           'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
       ]);

        return view('recues.create',compact('date', 'types', 'directions','imputations', 'date_r', 'chart'));
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
                'message'       =>  'required|string|max:255',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_recep'        =>  'required|date',
                'date_cores'        =>  'required|date',
            ]
        );
        $types_courrier_id = TypesCourrier::where('name','Courriers arrives')->first()->id;
        $users_id  = Auth::user()->id;

        // dd($users_id);

        $courrier_id = Courrier::get()->last()->id;
        $annee = date('Y');
        $numCourrier = $courrier_id;

        $direction = \App\Direction::first();
        $imputation = \App\Imputation::first();
        $courrier = \App\Courrier::first();

        // $filePath = request('file')->store('recues', 'public');
        $courrier = new Courrier([
            'numero'             =>     "CA-".$annee."-".$numCourrier,
            'objet'              =>      $request->input('objet'),
            'message'            =>      $request->input('message'),
            'expediteur'         =>      $request->input('expediteur'),
            'telephone'          =>      $request->input('telephone'),
            'email'              =>      $request->input('email'),
            'adresse'            =>      $request->input('adresse'),
            'fax'                =>      $request->input('fax'),
            'bp'                 =>      $request->input('bp'),
            'date_recep'             =>      $request->input('date_recep'),
            'date_cores'             =>      $request->input('date_cores'),
            // 'legende'            =>      $request->input('legende'),
            'types_courriers_id' =>      $types_courrier_id,
            'users_id'           =>      $users_id,
            'file'               =>      ""
        ]);

        $courrier->save();

        $recue = new Recue([
            'numero'        =>  "CA-".$annee."-".$numCourrier,
            'courriers_id'  =>   $courrier->id
        ]);
        
        $recue->save();
        
        //$courrier->directions()->sync($request->directions);
        $courrier->imputations()->sync($request->imputations);

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function edit(Recue $recue)
    {

        
        $this->authorize('update', $recue->courrier);

        $directions = Direction::pluck('sigle','id');
        $imputations = Imputation::pluck('sigle','id');

        $chart      = Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

        //dd($recue);

            //dd($directions);
         return view('recues.update', compact('recue', 'directions', 'imputations', 'chart'));
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
        $this->authorize('update',  $recue->courrier);

        $this->validate(
            $request, [
                'objet'         =>  'required|string|max:200',
                'message'       =>  'required|string|max:550',
                'expediteur'    =>  'required|string|max:100',
                'adresse'       =>  'required|string|max:100',
                'telephone'     =>  'required|string|max:50',
                'email'         =>  'required|email|max:255',
                'date_recep'    =>  'required|date',
                'date_cores'          =>  'required|date',
                'file'          =>  'sometimes|required|file|max:30000|mimes:pdf,doc,txt,xlsx,xls,jpeg,jpg,jif,docx,png,svg,csv,rtf,bmp|max:100000',

            ]
        );

        if (request('file')) {
             $filePath = request('file')->store('recues', 'public');
        $courrier = $recue->courrier; 
        $types_courrier_id = TypesCourrier::where('name','Courriers arrives')->first()->id;
        $user_id           = Auth::user()->id;
 
        //dd($courrier);

        $courrier->objet              =      $request->input('objet');
        $courrier->message            =      $request->input('message');
        $courrier->expediteur         =      $request->input('expediteur');
        $courrier->telephone          =      $request->input('telephone');
        $courrier->email              =      $request->input('email');
        $courrier->adresse            =      $request->input('adresse');
        $courrier->fax                =      $request->input('fax');
        $courrier->bp                 =      $request->input('bp');
        $courrier->date_recep         =      $request->input('date_r');
        $courrier->date               =      $request->input('date_c');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->users_id           =      $user_id;
        $courrier->file               =      $filePath;
        $courrier->save(); 

        $recue->courriers_id          =      $courrier->id; 

        $recue->save();
        
        //$courrier->directions()->sync($request->input('directions'));
        $courrier->imputations()->sync($request->input('imputations'));

         }
         else{            
        /*  dd($id); */
        $courrier = $recue->courrier;
        /* dd($courrier); */
 
        $types_courrier_id = TypesCourrier::where('name','Courriers arrives')->first()->id;

        $user_id           = Auth::user()->id;
 
        $courrier->objet              =      $request->input('objet');
        $courrier->message            =      $request->input('message');
        $courrier->expediteur         =      $request->input('expediteur');
        $courrier->telephone          =      $request->input('telephone');
        $courrier->email              =      $request->input('email');
        $courrier->adresse            =      $request->input('adresse');
        $courrier->fax                =      $request->input('fax');
        $courrier->bp                 =      $request->input('bp');
        $courrier->date_recep             =      $request->input('date_r');
        $courrier->date             =      $request->input('date_c');
        $courrier->legende            =      $request->input('legende');
        $courrier->types_courriers_id =      $types_courrier_id;
        $courrier->users_id           =      $user_id;
        
        $courrier->save();

        $recue->courriers_id          =      $courrier->id;
 
        $recue->save();

        //$courrier->directions()->sync($request->input('directions'));
        $courrier->imputations()->sync($request->input('imputations'));

        
         }

       return redirect()->route('courriers.show', $recue->courrier->id)->with('success','courrier modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recue  $recue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recue $recue)
    {
        $this->authorize('delete',  $recue->courrier);

        //$recue->courrier->directions()->detach();
        $recue->courrier->imputations()->detach();
        $recue->courrier->delete();
        $recue->delete();
        
        $message = "Le courrier enregistré sous le numéro ".$recue->numero.' a été supprimé';
        return redirect()->route('recues.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        /* $date = Carbon::today();
        $date = $date->copy()->addDays(-7); */

        $recues=Recue::with('courrier')->get();
        return Datatables::of($recues)->make(true);
    }
}