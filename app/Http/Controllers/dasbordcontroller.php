<?php

namespace App\Http\Controllers;

use App\Models\User;
 
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class dasbordcontroller extends Controller  
{

 
   
    public function dashbord( User $user){

        if(empty(Auth::check())){
            return to_route('user.login');
       }
       
        $users = User::all();
        
            return view('admin.dashbord', compact('users'));
        }
        
}
