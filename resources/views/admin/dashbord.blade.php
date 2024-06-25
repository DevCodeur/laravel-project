 
<x-layout>

    <p>hello, {{ auth()->user()->name }}</p>
    <h2>Listes des utilisateurs identifies</h2>
    <div>
      <table border="2">
          <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
             
              
              
             
          </tr>
          @foreach ($users as $user)
              <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  
                  
              </tr>
          @endforeach
      </table>
    
    </div>
  </x-layout>
  