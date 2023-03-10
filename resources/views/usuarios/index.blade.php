<x-app-layout>

@if($activeCommunity->nombreRole(auth()->user()->id) == 'admin')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios</h2>
            </div>
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($usuarios as $usuario)

            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->apellido1 }}</td>
                <td>
                    <form action="{{ route('usuarios.destroy',$usuario) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('usuarios.show',$usuario) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </table>

  @else 
    <div class="alert alert-warning">
        <p>No tienes permisos para ver los usuarios de esta comunidad</p>
    </div> 
  @endif

</x-app-layout>

