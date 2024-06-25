<x-layout>
    
<h2>Request a passord reset email</h2>

@if (session()->has('status'))
<span>{{ session('status') }}</span>


@endif

    <div class="form">
        <form action="{{ route('password.request') }}" method="POST">
            @csrf
            
           
           <div class="btn">   
            forgot password :
            <div>

                <label for="email">Email:</label><br>
                <input type="email" name="email" value="{{ old('email') }}">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            
            

              <button type="submit">submit</button>
            {{-- <div>
                <input type="submit" value="Login"> --}}
            </div>
        </form>
    </div>
</x-layout>
