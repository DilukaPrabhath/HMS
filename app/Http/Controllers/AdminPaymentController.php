<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
     public function index(){
        return view('backend.admin.payment.customer_payment');
     }
}
