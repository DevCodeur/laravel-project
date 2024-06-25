<x-layout>
  
    
    <div class="form">
        <form action="{{ route('register.store') }}" method="POST">
            
            @csrf
            <div class="btn"> 
                PAGE D 'INSCRIPTION:
             <div>   
                <label for="name">Name</label><br>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div><br>
           
            <div>
                <label for="email">Email:</label><br>
                <input type="email" name="email" value="{{ old('email') }}">
    
                @error('email')
                <p>{{ $message }}</p>
            @enderror
    
            </div><br>
            <div>
                <label for="password">password:</label><br>
                <input type="password" name="password" >
                @error('password')
                <p>{{ $message }}</p>
            @enderror
    
            </div><br>
            <div>
                <label for="password_confirmation">confirm password:</label><br>
                <input type="password" name="password_confirmation" >
                @error('password')
                <p >{{ $message }}</p>
            @enderror
            </div>
    
            @error('failed')
            <p>{{ $message }}</p>
        @enderror


        <div>
                
            <input type="checkbox" name="subscribe" id="subscribe">
            <label for="subscribe">subscribe to our newsletter</label>
        </div>
            <div>
                <button type="submit">register</button>
                {{-- <input type="submit" value="register"> --}}
            </div>
        </form>
    </div>
    
    </x-layout>