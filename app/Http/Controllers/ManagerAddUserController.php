<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\user_type;
use App\address;
use App\roomboy;
use App\User;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\SendMail;

class ManagerAddUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index(){
        $users = User::all();
        return view('backend.manager.user.index',compact('users'));
     }

     public function create(){
        $usertype = user_type::all();  
         $address = DB::table('addresses')
        ->groupBy('province')
        ->get();
        return view('backend.manager.user.create',compact('usertype','address'));
     }
        public function nonsystem(){
        $roomboy = roomboy::all();
        return view('backend.manager.user.non_system_emp',compact('roomboy'));
     }
      public function createroomboy(){
        $usertype = user_type::where('id','=',5);  
         $address = DB::table('addresses')
        ->groupBy('province')
        ->get();
        return view('backend.manager.user.add_non_system_emp',compact('usertype','address'));
     }
   
    function fetch(Request $request)
{
    $select = $request->get('select');
    $value = $request->get('value','dependent');
    $dependent = $request->get('dependent');
    $data = DB::table('addresses')
    ->where($select,$value)
    ->groupBy($dependent)
    ->get();

    $output = '<option value=""> Select '.ucfirst($dependent).'</option>';
    foreach ($data as $row ) 
    {
        $output .= '<option value=" '.$row->$dependent. ' ">'.$row->$dependent.'</option>';

    }
    echo $output;
}
    public function store(Request $request)
    {
        
        $latest = User::latest()->first();
      if (! $latest) {
          $userid = 'HMS/EMP/000001';
      }
      else{
        $string = preg_replace("/[^0-9\.]/", '', $latest->emp_no);
          $userid = 'HMS/EMP/' . sprintf('%06d', $string+1);
      
    }

        $this->validate(request(), [

        'email'      => 'required|email|unique:users',
        'fname'       => 'required',
        'lname'    => 'required',
        'nic'    => 'required|min:10|max:10|unique:users',
        'dob'    => 'required',
        'line1'    => 'required',
        'line2'    => 'required',
        'city'    => 'required',
        'district'    => 'required',
        'province'    => 'required', 
        'country'    => 'required',
        'zip'     => 'required',
        'gender'     => 'required',
        'mobile_no'     => 'required|max:10',
        'usertype'     => 'required',
        'userimg'     => 'required',
        'password'   => 'required|min:6',
        'repeat_password'=>'required|same:password',
        ]);

   
        $user = new User;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->nic=$request->nic;
        $user->dob=$request->dob;
        $user->line1=$request->line1;
        $user->line2=$request->line2;
        $user->line3=$request->line3;
        $user->city=$request->city;
        $user->district=$request->district;
        $user->province=$request->province;
        $user->country=$request->country;
        $user->zip=$request->zip;
        $user->gender=$request->gender;
        $user->mobile_no=$request->mobile_no;
        $user->user_type_id=$request->usertype;
        $user->emp_no=$userid;
        $user->email=$request->email;
        $user->password=Hash::make($request->repeat_password);

        if($request->hasfile('userimg')){
    
                    $file =$request->file('userimg');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/UserImages/',$filename);
                    $user->userimg=$filename;

                    
                   }else{
                       echo 'hi';
                       $user->userimg = 'noimg.jpg';
                   }
      
        $user->save();


$data = [
           'fname' => $user->fname,
           'email' => $user->email,
           'password' => $user->password
];
Mail::send('backend.admin.user.mail', $data , function($message){
$message->to(Input::get('email'), Input::get('fname').' '.Input::get('lname'))->subject('Welcome to the Hotel Grand Opera');
});

        
        $notification = array(
           'message' => 'Employee Registration successfully.! Confirmation is send your Email.!',
            'alert-type' => 'Success'
        );
        
        return redirect('manager/users')->with($notification);

     }
      public function storeroomboy(Request $request)
    {
        
        $latest = roomboy::latest()->first();
      if (! $latest) {
          $userid = 'NON/EMP/000001';
      }
      else{
        $string = preg_replace("/[^0-9\.]/", '', $latest->emp_no);
          $userid = 'NON/EMP/' . sprintf('%06d', $string+1);
      
    }

        $this->validate(request(), [

        'email'      => 'required|email|unique:roomboys',
        'fname'       => 'required',
        'lname'    => 'required',
        'nic'    => 'required|min:10|max:10|unique:roomboys',
        'dob'    => 'required',
        'line1'    => 'required',
        'line2'    => 'required',
        'city'    => 'required',
        'district'    => 'required',
        'province'    => 'required', 
        'country'    => 'required',
        'zipcode'     => 'required',
        'gender'     => 'required',
        'mobile_no'     => 'required|max:10',
        'usertype'     => 'required',
        'userimg'     => 'required',
        ]);

   
        $roomboys = new roomboy;
        $roomboys->fname=$request->fname;
        $roomboys->lname=$request->lname;
        $roomboys->nic=$request->nic;
        $roomboys->dob=$request->dob;
        $roomboys->line1=$request->line1;
        $roomboys->line2=$request->line2;
        $roomboys->line3=$request->line3;
        $roomboys->city=$request->city;
        $roomboys->district=$request->district;
        $roomboys->province=$request->province;
        $roomboys->country=$request->country;
        $roomboys->zipcode=$request->zipcode;
        $roomboys->gender=$request->gender;
        $roomboys->mobile_no=$request->mobile_no;
        $roomboys->user_type_id=$request->usertype;
        $roomboys->emp_no=$userid;
        $roomboys->email=$request->email;

        if($request->hasfile('userimg')){
    
         $file =$request->file('userimg');
         $extension=$file->getClientOriginalExtension();
         $filename=time().'.'.$extension;
         $file->move('Upload/UserImages/',$filename);
         $roomboys->image=$filename;

                    
                   }else{
                       echo 'hi';
                       $roomboys->image = 'noimg.jpg';
                   }
      
         $roomboys->save();


            $data = [
           'fname' => $roomboys->fname,
           
];
Mail::send('backend.manager.user.roomboy_mail', $data , function($message){
$message->to(Input::get('email'), Input::get('fname').' '.Input::get('lname'))->subject('Welcome to the Hotel Grand Opera');
});

        
        $notification = array(
           'message' => 'Employee Registration successfully! Confirmation is send your Email.!',
            'alert-type' => 'Success'
        );
        
        return redirect('admin/roomboy')->with($notification);

     }

     public function view($id)
    {
        $user = User::find($id);
       $data = user_type::all();
        return view('backend.manager.user.view',compact('user','data'));
 
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = user_type::all();
        return view('backend.manager.user.edit',compact('user','data'));
    }

    public function update(Request $request ,$id)
    {
        $this->validate(request(), [

        'email'    =>'required',
        'fname'    => 'required',
        'lname'    => 'required',
        'nic'      => 'required|min:10|max:10',
        'dob'      => 'required',
        'line1'    => 'required',
        'line2'    => 'required',
        'line3'    => 'required',
        'city'     => 'required',
        'district' => 'required',
        'province' => 'required', 
        'country'  => 'required',
        'zip'      => 'required',
        'gender'   => 'required',
        'mobile_no' =>'required',
        'usertype' => 'required',
        'status'   => 'required',
        ]);

        $user = User::find($id);

        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->nic=$request->nic;
        $user->dob=$request->dob;
        $user->line1=$request->line1;
        $user->line2=$request->line2;
        $user->line3=$request->line3;
        $user->city=$request->city;
        $user->district=$request->district;
        $user->province=$request->province;
        $user->country=$request->country;
        $user->zip=$request->zip;
        $user->gender=$request->gender;
        $user->mobile_no=$request->mobile_no;
        $user->user_type_id=$request->usertype;
        $user->email=$request->email;
        $user->status=$request->status;

        if($request->hasfile('userimg')){
    
                    $file =$request->file('userimg');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('Upload/UserImages/',$filename);
                    $user->userimg=$filename;

                    
                   }else{
                       echo 'hi';
                   }
      
        $user->save();
         $notification = array(
           'message' => 'Employee Update successfully!',
            'alert-type' => 'Success'
        );
        
        return redirect('manager/users')->with($notification);

    }
}
