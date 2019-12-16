<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{

/*     function getAllMonths(){

		$month_array = array();
		$courriers_dates = \App\Courrier::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$courriers_dates = json_decode( $courriers_dates );

		if ( ! empty( $courriers_dates ) ) {
			foreach ( $courriers_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date->date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
    }

    function getMonthlyCourrierCount( $month ) {
		$monthly_courrier_count = \App\Courrier::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_courrier_count;
    }

    function getMonthlyCourrierData() {

		$monthly_courrier_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_courrier_count = $this->getMonthlyCourrierCount( $month_no );
				array_push( $monthly_courrier_count_array, $monthly_courrier_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_courrier_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_courrier_data_array = array(
			'months' => $month_name_array,
			'courrier_count_data' => $monthly_courrier_count_array,
			'max' => $max,
		);

		return $monthly_courrier_data_array;

    } */
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courriers = \App\Courrier::get()->count();
        //$formations = \App\Formation::get()->count();
        //$operateurs = \App\Operateur::get()->count();
		//$demandes = \App\Demande::get()->count();
		
		$data = DB::table('users')
       ->select(
        DB::raw('civilite as civilite'),
        DB::raw('count(*) as number'))
       ->groupBy('civilite')
       ->get();
     $array[] = ['Civilite', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->civilite, $value->number];
     }
	 return view('layout.default', compact('courriers'))->with('civilite', json_encode($array));
	 
       /*  return view('layout.default', compact('courriers')); */
    }
}
