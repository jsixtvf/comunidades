<x-app-layout>

    @if($usuario->role(auth()->user()->id) == 2)
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('propiedades.create') }}">Crear propiedad</a>
        </div>
    @endif
      

    @if( $activeCommunity->nombreRole($usuario->id) != 'admin' )
        @php $propiedades = $usuario->propiedades; @endphp
    @endif

    @if($propiedades->where($usuario->id)->count() == 0)

            <div class="alert alert-warning">
                <p>No eres propietario en esta comunidad</p>
            </div> 
            
    @else

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>

            @foreach($propiedades as $propiedad)
            <tr>
                <td>{{ $propiedad->id }}</td>
                <td>{{ $propiedad->nombre }}</td>
                <td>{{ $propiedad->nombreUser($propiedad->user_id) }}</td>
                <td>
                    <form action="{{ route('propiedades.destroy',$propiedad->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('propiedades.show',$propiedad->id) }}">Mostrar</a>

                        @csrf
                        @method('DELETE')

                        @if($usuario->role(auth()->user()->id) == 2)
                        <button type="submit" class="btn btn-danger">Borrar</button>
                        @endif
                        
                    </form>
                </td>
            </tr>
        </table>
            @endforeach
    @endif
</x-app-layout>
