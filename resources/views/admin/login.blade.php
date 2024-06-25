<x-layout>
    

    <div class="form">
        <form action="{{ route('dologin') }}" method="POST">
            @csrf
            
           
           <div class="btn">   
            PAGE DE CONNEXION  :
            <div>

                <label for="email">Email:</label><br>
                <input type="email" name="email" value="{{ old('email') }}">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Password:</label><br>
                <input type="password" name="password">

                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label><br><br>
                <a href="{{ route('password.request')}}">forgot your password</a>

                @error('remember')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            @error('failed')
                <p>{{ $message }}</p>
            @enderror

              <button type="submit"> log in</button>
            {{-- <div>
                <input type="submit" value="Login"> --}}
            </div>
        </form>
    </div>
</x-layout>
