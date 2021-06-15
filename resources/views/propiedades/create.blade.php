<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
                <h1 class="display-6"> @lang('Crear propiedad') </h1>
                <x-jet-validation-errors></x-jet-validation-errors>

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

                    <label for="propietario" class="form-label">Propietario</label>
                    <input required type="text" id="propietario" name="propietario" class="form-control"  value="{{ old('propietario') }}"/>

                    @error('propietario')
                    <div class="alert alert-danger mb-2" role="alert">
                        {{ $message }}
                    </div>
                    @enderror

                    <label for="tipo" class="form-label">Tipo de propiedad</label>
                    <select required class="form-select form-select-sm" id="tipo" name="tipo"   value="{{ old('tipo') }}">
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
                    <input type="text" id="observacion" name="observacion" class="form-control"  value="{{ old('observacion') }}"/>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>