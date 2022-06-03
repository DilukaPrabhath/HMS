<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminChangePasswordController extends Controller
{
      
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('backend.admin.changepassword.changePassword');
    } 
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $notification = array(
           'message' => 'Password Change Successfully.!',
            'alert-type' => 'Success'
        );
        return redirect('change-password')->with($notification);
    }
}
