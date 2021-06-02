@csrf

<x-jet-button>{{ __($btnText1) }}</x-jet-button>
<x-jet-danger-button onclick="location.href ='{{ route('proveedores.pasarComunidad', Session()->get('activeCommunity')) }}'">{{ __($btnText2) }}</x-jet-danger-button>

<x-jet-validation-errors></x-jet-validation-errors>


<div class="row form-group">
    <div class="col-4">
        <div class="form-group">
            <label for="fechalta">@lang('Create Date')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechalta" placeholder=@lang('fechalta') value="{{ old('fechalta', $proveedor->fechalta) }}" required>
        </div>
    </div>
    <div class="col-4">
        <label for="cif">@lang('cif')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="9" name="cif" placeholder=@lang('cif') value="{{ old('cif', $proveedor->cif) }}" required>
    </div>

    <select class="form-select" aria-label="Default select example" name="tipo">
        <option value="0">@lang('Type')</option>
        @forelse($tipos as $tipo)
        @if ( old('tipo', $proveedor->id) == $tipo->id )
        <option value="{{ $tipo->id }}" selected > {{ $tipo->tipo }} </option>
        @else
        <option value="{{ $tipo->id }}"> {{ $tipo->tipo }} </option>
        @endif
        @empty
        <p>vacio</p>
        @endforelse
    </select>
    
    <select class="form-select" aria-label="Default select example" name="calificacion">
        <option selected>Calificacion</option>
        <option value="Pésima">Pésima</a>
        <option value="Mala">Mala</option>
        <option value="Normal">Normal</option>
        <option value="Buena">Buena</option>
        <option value="Excelente">Excelente</option>
    </select>

    <select class="form-select" aria-label="Default select example" name="figura">
        <option selected>Figura</option>
        <option value="Jurídica">Juridica</option>
        <option value="Física">Fisica</option>
    </select>


    <div class="form-group">
        <label for="nombre">@lang('nombre')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="nombre" placeholder=@lang('nombre') value="{{ old('nombre', $proveedor->nombre) }}" required>
        @if ($errors->has('nombre'))
        <span class="error-message">{{ $errors->first('nombre') }}</span>
        @endif
    </div>


    <div class="form-group">
        <label for="apellido1">@lang('apellido1')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="apellido1" placeholder=@lang('apellido1') value="{{ old('apellido1', $proveedor->apellido1) }}">
        @if ($errors->has('apellido1'))
        <span class="error-message">{{ $errors->first('apellido1') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="apellido2">@lang('apellido2')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="apellido2" placeholder=@lang('apellido2') value="{{ old('apellido2', $proveedor->apellido2) }}" >
        @if ($errors->has('apellido2'))
        <span class="error-message">{{ $errors->first('apellido2') }}</span>
        @endif
    </div>


    <div class="col-4">
        <div class="form-group">
            <label for="email">@lang('email')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="email" name="email" min="1" placeholder=@lang('email') value="{{ old('email', $proveedor->email) }}">
        </div>
    </div>

</div>

<div class="col-4">
    <div class="form-group">
        <label for="telefono">@lang('telefono')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" name="telefono" min="1" placeholder=@lang('telefono') value="{{ old('telefono', $proveedor->telefono) }}" required>
    </div>
</div>



<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications address')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="calle">@lang('calle')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="calle" placeholder=@lang('calle') value="{{ old('calle', $proveedor->calle) }}" >
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="codigopais">@lang('codigopais')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="codigopais" placeholder=@lang('codigopais') value="{{ old('codigopais', $proveedor->codigopais) }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="cp" placeholder=@lang('cp') value="{{ old('cp', $proveedor->cp) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="pais">@lang('pais')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="pais" placeholder=@lang('pais') value="{{ old('pais', $proveedor->pais) }}" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="provincia">@lang('provincia')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="provincia" placeholder=@lang('provincia') value="{{ old('provincia', $proveedor->provincia) }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="localidad">@lang('localidad')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="localidad" placeholder=@lang('localidad') value="{{ old('localidad', $proveedor->localidad) }}" required>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="iban">@lang('Iban')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="iban" placeholder=@lang('iban') value="{{ old('iban', $proveedor->iban) }}" required>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>