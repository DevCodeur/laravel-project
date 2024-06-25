<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller  implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
      

     
    public static function middleware():array
    {
        return [
            new Middleware(['auth', 'verified'], except : ['index', 'show'])
        ];
    }

     
    public function index(Request $request)
    {
       
      
        $products = Product::all();
        return view('products.index', compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {


    


      $path = Storage::disk('public')->put('avatars', 
        
      $request->avatar);

      
        $product = new Product();
        
        $product->name = $request->input('name');

        $product->title = $request->input('title');

        $product->content = $request->input('content');

        $product->price = $request->input('price');

        $product->qty = $request->input('qty');

        $product->comment = $request->input('comment');

        $product->avatar = $request->$path;

        $product->user_id = auth()->id();
        

      Storage::disk('public')->put('avatars', 
        
        $request->avatar);
         
        Mail::to(Auth::user())->send(new WelcomeMail(auth::user(), $product));

        $product->save();


        return to_route('product.index')->with('success' , 'product created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

      
       
        return view('products.edit', ['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, int $id)
    {
        
        

       
        $product = Product::findorfail($id);
        
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->content = $request->input('content');
        $product->price = $request->input('price');
        $product->qty = $request->input('qty');
        $product->comment = $request->input('comment');
        $product->user_id = auth()->id();

            $product->update();
         
            return to_route('product.index')->with('succes', 'product updated successfully');

         


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


      $product = Product::findorfail($id);
      
      if(!$product){
        return to_route('product.index')->with('error', 'attention! vous n\'avez pas des produits pour cet instant');

        
      }
      if($product->user_id !== auth()->id()){

        return to_route('product.index')->with('error', 'attention! cet  produit vous appartient pas');

      }
      
      $product->delete();
      
      return to_route('product.index')->with('success' , 'product deleted successfully');
  
    }
}
