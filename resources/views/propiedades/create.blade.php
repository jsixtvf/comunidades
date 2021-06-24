<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
                <h1 class="display-6"> @lang('Crear propiedad') </h1>
                <x-jet-validation-errors></x-jet-validation-errors>
                @if($usuario->role(auth()->user()->id) == 2)
                    <form action="{{ route('propiedades.store') }}" method="POST">
                        
                        <div class="inline-flex">
                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                        <x-jet-danger-button  onclick="location.href ='{{ route('propiedades.index') }}'"> @lang('Cancel')</x-jet-danger-button>
                        </div>
                        <br>
                        <br>
                        @csrf
                        <label for="nombre" class="form-label">Nombre</label>
                        <input required type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"/>

                        @error('nombre')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                        @enderror


                        <label for="user_id" class="form-label">Usuario</label>
    <!--                     <input required type="text" id="usuario" name="usuario" class="form-control"  value="{{ old('usuario') }}"/>
     -->                    <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">

                            <option value="0">@lang('Selecciona usuario')</option>

                                @forelse($usuarios as $usuario)
                                        @if($usuario->role($usuario->id) == 3)
                                        <option value="{{ $usuario->id }}"> {{ $usuario->name }} {{ $usuario->apellido1 }}, {{ $usuario->dni }} </option>
                                        @endif
                                @empty
                                <p>vacio</p>
                                @endforelse

                            </select>
                            @error('user_id')
                            <div class="alert alert-danger mb-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                        <label for="comunidad" class="form-label">Comunidad</label>
                         <input type="hidden" id="comunidad_id" name="comunidad_id" value="{{ session()->get('activeCommunity')->id }}">
                         <div class="form-control">{{ session()->get('activeCommunity')->denom }} </div>
                        @error('comunidad_activa')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="tipo" class="form-label">Tipo de propiedad</label>
                        <select required class="form-select form-select-sm" id="tipo" name="tipo" value="{{ old('tipo') }}">
                            <option value="local">Local</option>
                            <option value="piso">Piso</option>
                            <option value="atico">Atico</option>
                        </select>

                        @error('tipo')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <br>
                        <label for="coeficiente" class="form-label">Coeficiente</label>
                        <input required type="integer" id="coeficiente" name="coeficiente" class="form-control"  value="{{ old('coeficiente') }}"/>

                        @error('coeficiente')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="parte" class="form-label">Parte</label>
                        <input required type="text" id="parte" name="parte" class="form-control"  value="{{ old('parte') }}"/>

                        @error('parte')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="observacion" class="form-label">Observaciones</label>
                        <input type="text" id="observaciones" name="observaciones" class="form-control"  value="{{ old('observaciones') }}"/>

                    </form>
                 @else 
                    <div class="alert alert-warning">
                        <p>No tienes permisos de admnistrador en esta comunidad</p>
                    </div> 
            @endif
            </div>
        </div>
    </div>
</x-app-layout>