<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($user)
    {
    
         if(auth()->user()){
              if($user == auth()->user()->id){
                  return redirect('/home');
         }}

        $user = User::findOrFail($user);
        return view('profile.index',[
            'user' => $user,
        ]); 
    }



    public function edit(User $user) //this is instead of u sing findOrFail 
    {   
        return view('profile.edit',compact('user'));
    }



    
    public function update($user)
    {
        dd("this is the update method beeing called!");
    }


}
