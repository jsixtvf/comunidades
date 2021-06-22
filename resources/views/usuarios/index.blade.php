

<x-app-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios</h2>
            </div>
            @if(auth()->user()->role(auth()->user()->id) == 2)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Create New User</a>
            </div>
            @endif
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
            @if($usuario->role($usuario->id) == 3)

            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->apellido1 }}</td>
                <td>
                    <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('usuarios.show',$usuario) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
</x-app-layout>

