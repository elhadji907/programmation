<?php

namespace App\Http\Controllers;

use App\Direction;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DirectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('directions.index');
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
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function show(Direction $direction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function edit(Direction $direction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direction $direction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direction  $direction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        //
    }

    public function list(Request $request)
    {
        $directions=Direction::with('users')->get();
        return Datatables::of($directions)
        ->addColumn('action', function($direction){
            return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$direction->id.'">
            <i class="far fa-edit"></i>Edit</a><a href="#" class="btn btn-xs btn-success imputation" id="'.$direction->id.'">
            <i class="fas fa-angle-double-right"></i>Imputation</a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="direction_checkbox[]" class="direction_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);

    }


    function removedata(Request $request)
    {
        $recue = \App\Recue::find($request->input('id'));
        if($recue->delete())
        {
            echo 'Data Deleted';
        }
    }

    function massremove(Request $request)
    {
        $recue_id_array = $request->input('id');
        $recue = recue::whereIn('id', $recue_id_array);
        if($recue->delete())
        {
            echo 'Data Deleted';
        }
    }
}
