<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index(){
     return view('login');
    }

    function checklogin(Request $request){

     //check user data
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:8'
     ]);

     //get user data
     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     //make login
     if(Auth::attempt($user_data)){
      return redirect('main/successlogin');
     }
     else{
      return back()->with('error', 'Wrong Login Details');
     }

    }

    //go in success login page
    function successlogin(){
     return view('successlogin');
    }

    //make loguot
    function logout(){
     Auth::logout();
     return redirect('main');
    }

}
