<x-app-layout>  

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mostrar usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Vaya!</strong> Hay un problema con los datos introducidos<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(auth()->user()->role(auth()->user()->id) == 2) 
    <form action="" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input disabled type="text" name="name" value="{{ $usuario->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
             </br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <textarea disabled class="form-control"  name="Apellido1" placeholder="Apellido">{{ $usuario->apellido1 }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefono:</strong>
                    <textarea disabled class="form-control"  name="Telefono" placeholder="Telefono">{{ $usuario->telefono }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Calle:</strong>
                    <textarea disabled class="form-control"  name="Calle" placeholder="Calle">{{ $usuario->calle }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CP:</strong>
                    <textarea disabled class="form-control"  name="CP" placeholder="CP">{{ $usuario->cp }}</textarea>
                </div>
            </div>
        </div>
    </form>

        @else 
            <div class="alert alert-warning">
                <p>No tienes permisos de admnistrador en esta comunidad</p>
            </div> 
    @endif
</x-app-layout>
