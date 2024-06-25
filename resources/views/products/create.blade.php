<x-layout>
    
     
    
    <div class="form ">
         
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div>
                <label for="">Name</label><br>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p> 
                @enderror    
            </div>
            <div>
                <label for="">title</label><br>
                <input type="text" name="title"  value="{{ old('title') }}">
                @error('title')
                <p>{{ $message }}</p>
            @enderror
            </div>
    
            <div>
                <label for="">body</label><br>
                <input type="text" name="content"  value="{{ old('content') }}" >
    
                @error('content')
                <p>{{ $message }}</p>
            @enderror
    
            </div>
             
            
            <div>
                <label for="price">total price</label><br>
                <input type="text" name="price"  value="{{ old('price') }}">
    
                @error('price')
                <p>{{ $message }}</p>
            @enderror
    
            </div>
          
            <div>
                <label for="qty">total qty</label><br>
                <input type="text" name="qty"  value="{{ old('qty') }}">
    
                @error('qty')
                <p>{{ $message }}<p>
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
                <label for="avatar">une photo de couverture:</label>
                <input type="file" name="avatar" id="avatar"  value="{{ old('avatar') }}">
                @error('avatar')
                <p>{{ $message }}</p>
            @enderror
             </div>
            <div>
                <button style="" type="submit">submit</button>
            </div>
        </form>
      
    </div>

     
    </x-layout>