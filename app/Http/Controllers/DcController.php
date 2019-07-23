<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DcController extends Controller
{
  public function registerUser(){

    return view('Dc.register');
  }


  public function register(Request $request){

    $this->validate($request , [

        'username'=>'required',
        'email'=>'required|unique:users',
        'role'=>'required',
        'tehsil'=>'required',
        'password'=>'required|confirmed|max:255',


    ]);

  User::create([

       'username' => $request->username,
       'email' => $request->email,
       'role' => $request->role,
       'tehsil' => $request->tehsil,
       'password' => bcrypt($request->password)

  ]);


    return redirect('/showUsers')->with('create','User Registerd');
}

  public function showUsers(){

      $users = User::all();

       return view('Dc.showUsers')->with('users',$users);

  }

  public function deleteUser($id){

        $user = User::find($id);

        $user->delete();

        return redirect('/showUsers')->with('delete','User Deleted Successfully');

  }

}
