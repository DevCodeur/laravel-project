<x-layout>
<h2>Listes de votre produits</h2>
@if (auth()->check())    
       <p1>Bonjour, <strong >{{ auth()->user()->name }} </strong> &nbsp;voici la liste des vos produits:</p1><br><br>
   @if (auth()->user()->products->isempty())
       <p1>je suis desollé  <strong>{{  auth()->user()->name  }} </strong>, vous n'avez pas encore des produits <span><a href="{{ route('product.create') }}">créer</a></span> &nbsp; ou passer au mode demo <span><a href="">demo</a></span></p1>
   @else
     <ul>
        @foreach (auth()->user()->products as $product)
            <li>{{  $product->name .' => '  .$product->price  }}</li>
            <span>{{ $product->created_at->diffForHumans (['parts' =>3, 'join' =>true])}}</span>
        @endforeach</ul>  
   @endif
@else
    <p><a href="{{ route('login') }}">se connecter!</a></p>
@endif
</x-layout>  