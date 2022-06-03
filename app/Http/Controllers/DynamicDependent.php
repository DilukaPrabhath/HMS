<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DynamicDependent extends Controller
{
    function index()
    {
    	$province_list = DB::table('address')
    					-> groupby ('province')
    					->get();
    	return view ('dynamic_dependent')->with('province_list',$province_list); 
    }

    function fetch(Request $request)
{
	$select = $request->get('select');
	$value = $request->get('value');
	$dependent = $request->get('dependent');
	$data = DB::table('address')
	->where($select,$value)
	->groupby($dependent)
	->get();

	$output = '<option value=""> Select '.ucfirst($dependent).'</option>';
	foreach ($data as $row ) {
		$output .= '<option value=" '.$row->$dependent. ' ">'.$row->$dependent.'</option>';

	}
	echo $output;
}
}
