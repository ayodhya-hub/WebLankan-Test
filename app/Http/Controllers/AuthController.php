<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    //get login view
    public function login()
    {
        return view('auth.login');
    } 

    //get register view
    public function registration()
    {
        return view('auth.register');
    }  
    
    //registation process
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required|digits_between:9,12',
            'address' => 'required',
            'password' => 'required|same:confirm_password|min:8',
            'confirm_password' => 'required|min:8',
        ]);
           
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->home_address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
         
        return redirect("login");
    }

    //login process
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

           return redirect("get-members");
        }
  
        return redirect("login");
    }
    
}