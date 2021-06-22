<x-app-layout>
    @if($usuario->role(auth()->user()->id) == 2)
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('propiedades.create') }}">Crear propiedad</a>
        </div>
    @endif
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Propietario</th>
                <th>Acciones</th>
            </tr>
            @foreach ($propiedades as $propiedad)
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
            @endforeach
        </table>
</x-app-layout>
