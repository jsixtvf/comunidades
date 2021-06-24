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

    <form action="" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tratamiento:</strong>
                    <input disabled type="text" name="tratamiento" value="{{ $usuario->tratamiento }}" class="form-control" placeholder="tratamiento">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input disabled type="text" name="name" value="{{ $usuario->name }}" class="form-control" placeholder="name">
                </div>
            </div>
             </br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <textarea disabled class="form-control"  name="apellido1" placeholder="apellido">{{ $usuario->apellido1 }}</textarea>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellido 2:</strong>
                    <textarea disabled class="form-control"  name="apellido2" placeholder="apellido2">{{ $usuario->apellido2 }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>e-mail:</strong>
                    <textarea disabled class="form-control"  name="email" placeholder="email">{{ $usuario->email }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pais:</strong>
                    <textarea disabled class="form-control"  name="pais" placeholder="pais">{{ $usuario->pais }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Provincia:</strong>
                    <textarea disabled class="form-control"  name="provincia" placeholder="provincia">{{ $usuario->provincia }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Localidad:</strong>
                    <textarea disabled class="form-control"  name="localidad" placeholder="localidad">{{ $usuario->localidad }}</textarea>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
