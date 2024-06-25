<x-layout>
    <h1>Bienvenue <span style="color: rgb(25, 0, 255)">dans</span> notre <span style="color: blue">site</span> &rarrc;</h1>
  
    
    
 <div>
    <a   style="background: blue; width:200px ; color:white;  text-decoration: none;text-transform: uppercase;font-size:20px;" href="{{ route('product.create')}}">add new product+</a>
   
 </div>
   
    
<div><br><br>
    @if (session()->has('success'))
        <span>{{ session('success') }}</span>
     
        
    @endif
</div >

<div><br><br>                         
    @if (session()->has('error'))
        <span>{{ session('error') }}</span>
     
        
    @endif
</div >
{{-- barre de recherche --}}
 

    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>USER_ID</th>
                <th>NAME</th>
                <th>TITLE</th>
                <th>CONTENT</th>
                <th>PRICE</th>
                <th>QTY</th>
                <th>COMMENT</th>
                <th>ACTION</th>
                
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->user_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->content }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->comment }}</td>
                    <td>
                        <a style="background-color: blue ; color:white ; text-decoration: none;" href="{{ route('product.edit', ['product' => $product]) }}">edit</a>
                    </td>
                    <td>
                        <div class="small"> 
                            <form action="{{ route('product.destroy', ['id' =>$product->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input style="background-color: red;  color:white" type="submit" value="Delete"> 
                                </form>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
 <img src="{{ asset('storage/avatars/Yb3jjtBazPCYjBD1ljqHKHRF2vWzeU0ELDGFbS9j.png') }}" alt="">

</x-layout>
