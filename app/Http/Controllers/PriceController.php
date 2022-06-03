<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;

class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(){
        $mealprice = item::all();
        return view('backend.admin.meals.item_price',compact('mealprice'));
     }
}
