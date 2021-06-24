 <x-app-layout>  

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar usuario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
            </div>
        </div>
    </div>
   <br>
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
        <form action="{{ route('usuarios.update',$usuario) }}" method="POST">
            @csrf
            @method('PUT')
       
             <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tratamiento:</strong>
                        <select  required class="form-select form-select-sm" id="tratamiento" name="tratamiento">
                            <option value="Sr" {{ old("tratamiento") == "Sr" ? "selected" : "" }}>"Sr"</option>
                            <option value="Sra" {{ old("tratamiento") == "Sra" ? "selected" : "" }}>"Sra"</option>                       
                        </select>
                </div>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input required type="text" name="name" value="{{ $usuario->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                 </br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input required type="text" name="apellido1" value="{{ $usuario->apellido1 }}"  class="form-control" placeholder="PrimerApellido">
                    </div>
                </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Apellido 2:</strong>
                        <input required type="text" name="apellido2" value="{{ $usuario->apellido2 }}"  class="form-control" placeholder="SegundoApellido">
                    </div>
                </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contraseña:</strong>
                        <input required type="password" name="password" value="{{ $usuario->password }}"  class="form-control">
                    </div>
                </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha:</strong>
                        <input required type="date" name="fecha" value="{{ $usuario->fecha }}"  class="form-control">
                    </div>
                </div>
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>DNI:</strong>
                        <input required type="text" name="dni" value="{{ $usuario->dni }}"  class="form-control" placeholder="dni">
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input required type="email" name="email" value="{{ $usuario->email }}"  class="form-control" placeholder="email">
                    </div>
                </div>

                        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input required type="text" name="telefono" value="{{ $usuario->telefono }}" class="form-control" placeholder="telefono">
                   </div>
                </div>   
                <br>
                <h3>Dirección para notificaciones</h3>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Calle:</strong>
                        <input required type="text" name="calle" value="{{ $usuario->calle }}" class="form-control" placeholder="calle" >
                   </div>
                </div>  

                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Portal:</strong>
                        <input required type="text" name="portal" value="{{ $usuario->portal }}" class="form-control" placeholder="portal" >
                   </div>
                </div> 
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Bloque:</strong>
                        <input required type="text" name="bloque" value="{{ $usuario->bloque }}" class="form-control" placeholder="bloque" >
                   </div>
                </div>       
                        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Escalera:</strong>
                        <input required type="text" name="escalera" value="{{ $usuario->escalera }}" class="form-control" placeholder="escalera" >
                   </div>
                </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Piso:</strong>
                        <input required type="text" name="piso" value="{{ $usuario->piso }}" class="form-control" placeholder="piso" >
                   </div>
                </div>     
                       
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Puerta:</strong>
                        <input required type="text" name="puerta" value="{{ $usuario->puerta }}" class="form-control" placeholder="puerta" >
                   </div>
                </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Codigo País:</strong>
                        <input required type="text" name="codigo_pais" value="{{ $usuario->codigo_pais }}" class="form-control" placeholder="codigo pais" >
                   </div>
                </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Codigo Postal:</strong>
                        <input required type="text" name="cp" value="{{ $usuario->cp }}" class="form-control" placeholder="codigo postal" >
                   </div>
                </div>
                
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>País:</strong>
                        <input required type="text" name="pais" value="{{ $usuario->pais }}" class="form-control" placeholder="pais" >
                   </div>
                </div>

                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Provincia:</strong>
                        <input required type="text" name="provincia" value="{{ $usuario->provincia }}" class="form-control" placeholder="provincia" >
                   </div>
                </div>
                        
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Localidad:</strong>
                        <input required type="text" name="localidad" value="{{ $usuario->localidad }}" class="form-control" placeholder="localidad" >
                   </div>
                </div>       
                <br>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
        <br>
        <br>
        @else 
            <div class="alert alert-warning">
                <p>No tienes permisos de admnistrador en esta comunidad</p>
            </div> 
    @endif
</x-app-layout>
