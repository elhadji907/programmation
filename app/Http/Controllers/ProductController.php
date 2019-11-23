<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $products = \DB::table("roles")->get();
        return view('products',compact('products'));
    }

    public function destroy($id)
    {
    	\DB::table("roles")->delete($id);
    	return response()->json(['success'=>"Product Deleted successfully.", 'tr'=>'tr_'.$id]);
    }


    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        \DB::table("roles")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}