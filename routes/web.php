<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FooController;
 
 
 
 
use App\Http\Controllers\UserController;
use App\Http\Controllers\dasbordcontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResentPasswordController;

Route::get('/', function () {
    return view('welcome');
});

 

    
     

  

        Route::get('/register', [UserController::class, 'create']);

        Route::post('/register', [UserController::class, 'store'])
              ->name('register.store');
        
        Route::get('/login', [UserController::class, 'login'])
              ->name('login');
        
        Route::post('/login', [UserController::class, 'dologin'])
              ->name('dologin');
    
     
   
   Route::Delete('/logout', [UserController::class, 'logout'])
              ->name('logout');


   
  Route::get('products', [ProductController::class, 'index'])
              ->name('product.index');

        Route::get('products/create', [ProductController::class, 'create'])
              ->name('product.create');

        Route::post('products', [ProductController::class, 'store'])
        
              ->name('product.store');
        
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])
               ->name('product.edit');
         
        Route::put('products/{id}/update', [ProductController::class, 'update'])
               ->name('product.update');
         
        Route::delete('products/{id}/delete', [ProductController::class, 'destroy'])
              ->name('product.destroy');
         
        
            Route::get('/dashbord', [dasbordcontroller::class, 'dashbord'])
                      ->middleware('verified')
             
                       ->name('dashbord');
            


 //email verified notice
 Route::get('email/verify', [UserController::class, 'VerifyNotice'])
            ->name('verification.notice');


 //email verified handler 
 Route::get('email/verify/{id}/{hash}', [UserController::class, 'VerifyEmail'])
            ->middleware('signed')
            ->name('verification.verify');

//resending email
 Route::post('email/verifirication-notification', [UserController::class, 'VerifyHandler'])
           ->middleware('throttle:6,1')
            ->name('verification.send');
//forgot password

Route::view('/forgot-password', 'admin.forgot-password')->name('password.request');



Route::post('/forgot-password', [ResentPasswordController::class, 'passwordEmail'])
         ->middleware('guest')
         ->name('password.email');

Route::get('/reset-password/{token}', [ResentPasswordController::class, 'passwordReset'])
         ->middleware('guest')
         ->name('password.reset');


Route::post('/reset-password',[ResentPasswordController::class, 'passwordUpdate'])
           ->name('password.update');

           Route::get('foo', [FooController::class, 'foo'])->name('foo');
 