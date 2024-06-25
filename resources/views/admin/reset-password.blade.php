<x-layout>
  
    
    <div class="form">
        <form action="{{ route('password.update') }}" method="POST">
            
            @csrf
            <div class="btn"> 
                Reset your password:
             
           <input type="hidden" name="token" value="{{ $token }}">
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
                <button type="submit">resset password</button>
                {{-- <input type="submit" value="register"> --}}
            </div>
        </form>
    </div>
    
    </x-layout>