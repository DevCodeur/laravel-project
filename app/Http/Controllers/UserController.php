<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserSubscribed;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserController extends Controller
{
 
    public function create(){
        return view('admin.register');
    }


    public function store( Request $request){
           
        $fields = $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s\-]+$/|string',
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:4', 'confirmed']
        ]);
         $user = User::create($fields);
         Auth::login($user);

         
        if ($request->subscribe) {
            
            event (new UserSubscribed($user));
        }
       
        //return redirect()->route('user.login');
        
    
    }
    //email verify notice

    public function VerifyNotice(){
        
        return view('emails.verify-email');
    }

    //verify handler
    public function VerifyEmail(EmailVerificationRequest $request){
        
      $request->fulfill();
      
      return  redirect()->route('dashbord');
    }

    //Resending the verification Email Handler

    public function VerifyHandler(Request $request){
        
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('message', 'verification link send successfully');
    }

    
    public function login(){

        return view('admin.login');
    }

     public function dologin(Request $request){


        $fields = $request->validate([
            
            'email' => ['required', 'email','max:255'],
            
            'password' => ['required'],
        ]);
    
    
       if(auth::attempt(['email'=>$fields['email'], 'password' => $fields['password']], $request->filled('remember'))){
        
           $request->session()->regenerate();
           
           return redirect()->intended(route('dashbord'));
       };
       
       return back()->withErrors([
        
        'failed' => 'account not verified'
        
       ])->onlyInput('email');
        
        
     }

     

    public function logout(Request $request){
        auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
        return redirect()->intended(route('user.login'));
    }

  
}
