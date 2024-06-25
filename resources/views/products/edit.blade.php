 
<x-layout>
 
    
       
    
    <div class="form">
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
            @csrf
            @method('put')
            <div>
                <label for="">Name</label><br>
                <input type="text" name="name" value="{{ $product->name }}" >
                @error('name')
                    <p>{{ $message }}</p> 
                @enderror    
            </div>
            <div>
                <label for="">title</label><br>
                <input type="text" name="title" value="{{ $product->title }}" >
                @error('title')
                <p>{{ $message }}</p>
            @enderror
            </div>
    
            <div>
                <label for="">body</label><br>
                <input type="text" name="content" value="{{ $product->content }}" >
    
                @error('content')
                <p>{{ $message }}</p>
            @enderror
    
            </div>
             
            
            <div>
                <label for="price">total price</label><br>
                <input type="text" name="price" value="{{ $product->price }}" >
    
                @error('price')
                <p>{{ $message }}</p>
            @enderror
    
            </div>
          
            <div>
                <label for="qty">total qty</label><br>
                <input type="text" name="qty" value="{{ $product->qty }}" >
    
                @error('qty')
                <p>{{ $message }}</p>
            @enderror
    
            </div>
    
            </div><br><br>
            
             <div>
              <textarea name="comment"   cols="30" rows="10" class="bg-slate-50 px-7.5">
                
              </textarea>
    
              @error('comment')
              <p>{{ $message }}</p>
          @enderror
    
             </div><br><br>
            <div>
                <button type="submit" value="update">submit</button>
            </div>
        </form>
    </div>

   
    </x-layout>
    