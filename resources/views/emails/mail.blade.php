<x-layout>
    <h2>send Mail</h2>

 <span> hello!{{$user->name }}</span>

 <div>
    <h2>{{ $product->title }}</h2>
    <p2>{{ $product->content }}</p2>
    <p2>{{ $product->name }}</p2>
    <p2>{{ $product->qty }}</p2>
    <p2>{{ $product->price }}</p2>

    {{-- <img src="{{ $message->embed('avatars/'.$product->avatar) }}" alt=""> --}}
 </div>
</x-layout>