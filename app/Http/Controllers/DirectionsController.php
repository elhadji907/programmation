<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Fonction;
use App\TypesDirection;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Charts\Courrierchart;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);

       $directions = \App\Direction::all();

        return view('directions.index', compact('chart', 'directions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $chart      = \App\Courrier::all();
       $chart = new Courrierchart;
       $chart->labels(['', '', '']);
       $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
           'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
       ]);

       $direction_id=$request->input('direction');
       $direction=\App\Direction::find($direction_id);

       $types_directions = TypesDirection::distinct('name')->get()->pluck('name','id')->unique();
       $fonctions = Fonction::distinct('name')->get()->pluck('name','id')->unique();
       
       $employee_id=$request->input('employee');
       $employee=\App\Employee::find($employee_id);

      /*  dd($employee); */

        return view('directions.create',compact('user', 'chart','employee','types_directions','fonctions'));
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
                'direction'     => 'required|string|max:250',
                'sigle'         => 'required|string|max:10',
                'type_direction'      => 'required',
                'employee'            => 'required|exists:employees,id',
            ]
        );


        $employee_id=$request->input('employee');
        $employee=\App\Employee::find($employee_id);

        //dd($employee);
        
        $direction = new Direction([            
            'name'                  =>      $request->input('direction'),
            'sigle'                 =>      $request->input('sigle'),
            'types_directions_id'   =>      $request->input('type_direction'),
            'chef_id'               =>      $request->input('employee')

        ]);

        $direction->save();

        return redirect()->route('directions.index')->with('success','direction / service ajouté(e) avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {

        $employees = $direction->employees;

        $direction_courriers = $direction->courriers;

        $courriers = $direction->courriers()->paginate(2);
        
        return view('directions.show', compact('employees','courriers','direction','direction_courriers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directions = Direction::find($id);
        //dd($directions);

        $chart      = \App\Courrier::all();
        $chart = new Courrierchart;
        $chart->labels(['', '', '']);
        $chart->dataset('STATISTIQUES', 'bar', ['','',''])->options([
            'backgroundColor'=>["#3e95cd", "#8e5ea2","#3cba9f"],
        ]);        
        
        $types_directions = TypesDirection::distinct('name')->get()->pluck('name','name')->unique();
        
        //dd($types_directions);

        $employees = \App\Employee::distinct('matricule')->get()->pluck('matricule','matricule')->unique();

        //dd($employees);

        return view('directions.update', compact('directions','id','chart','types_directions','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request, 
            [
                'direction'     => 'required|string|max:250',
                'sigle'         => 'required|string|max:10',
                'type_direction'      => 'required',
            ]);

            $direction = Direction::find($id);
            
            $types_directions_id = TypesDirection::where('name',$request->input('type_direction'))->first()->id;
            
           /*  dd($types_directions_id); */

           //dd($request->input('employee'));
           
            $employee = \App\Employee::where('matricule',$request->input('employee'))->first()->id;

            //dd($employee);

            $direction->name                    =     $request->input('direction');
            $direction->sigle                   =     $request->input('sigle');
            $direction->types_directions_id     =     $types_directions_id;
            $direction->chef_id                 =     $employee;

            $direction->save();
        
            return redirect()->route('directions.index')->with('success','direction modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        $message = $direction->sigle.' a été supprimé(e)';
        return redirect()->route('directions.index')->with(compact('message'));
    }

    public function list(Request $request)
    {
        $directions=Direction::with('employees','chef')->get();
        return Datatables::of($directions)->make(true);

    }
}
