<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
 <style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background: #a9a9a95d;
        
    }
    nav ul{
        background-color: darkslategray;
        padding: 30px 0;
        
    }
    nav > ul >li{
     display: inline-block;
     list-style-type: none;
      
    }
    ul > li a{
        text-transform: uppercase;
        color: rgb(202, 202, 223);
        padding: 20px 30px;
        text-decoration: none; 
       
    }
     ul li a:last-child{
        margin-left: 100px;
    } 

    .form input{
        padding: 10px  120px;
       
    }
     button{
      padding: 10px  180px;
      background: blue;
      text-transform: capitalize;
      color: white;
    } 
    textarea{
        padding: 0px  98px;
    }
    footer{
        background-color: darkslategray;
        padding: 30px;
        margin-top: 280px;
    }
    h1{
        animation: slidedown 10s;
        text-align: center;
        text-transform: capitalize;
        font-style: italic;
    }
    @keyframes slidedown{
        0%{
            transform: translateX(-900px)
        }
       100%{
            transform: translateX(0px)
        }
       
    }
    p {
        color: red;
        display: block;
    }
    form .btn{
     margin: auto;
      
         background: rgb(7, 150, 131);
        width: 500px;
    }
    strong{
        font-size: 20px;
        text-transform: capitalize;
        color: blue;
    }
    
 </style>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('product.index') }}">Home</a></li>
                <li><a href="/">About</a></li>
                <li><a href="{{ route('foo') }}">Product</a></li>
                <li><a href="#">contact</a></li>
            
            @guest
              
            <li><a href="/register">sign up</a></li>
            <li> <a href="/login">log in</a></li>
         
            @endguest
        </ul>
        </nav>
    </header>
   
   <div>
    @auth
    <div style="display:block; margin-top:-60px">
        <span style="margin-left: 1200px;">{{ auth()->user()->name}}</span>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            @method('delete')
            <input style="margin-left: 1200px ;background-color:blue" type="submit" value="se deconnecter">
            
        </form>
  @endauth
   
  
    
</div>

   
    <main class=" py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
     </main>

      
</body>
</html>