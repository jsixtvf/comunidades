<x-app-layout>

    @if(session('status'))
    <div class="alert {{ session('status')[1] }} alert-dismissible fade show" role="alert">
        {{ session('status')[0] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
        <x-jet-button onclick="location.href ='{{ route('proveedores.create') }}'">@lang('New Provider')</x-jet-button>
    


    <!--  con button no funciona no coge href y usamos la etiqueta a

     <div class="col-12 col-sm-10 col-lg-6 mx-auto">
    <button class="btn btn-primary btn-lg btn-block"> @lang('Delete')</button>
    </div>

    {{ gettype($comunidad_seleccionada) }}
    {{$comunidad_seleccionada->proveedor}}
    -->
    
    @if ($comunidad_seleccionada->proveedor->count() > 0)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>@lang('id')</th>
                    <th>@lang('tipo')</th>
                    <th>@lang('calificacion')</th>
                    <th>@lang('nombre')</th>
                    <th>@lang('cif')</th>
                    <th>@lang('telefono')</th>
                    <th>@lang('email')</th>
                </tr>
            </thead>
            @forelse($comunidad_seleccionada->proveedor as $proveedor)
            <tbody>

                <tr>
                    <td>{{$proveedor->id}}</td>
                    <td>{{$proveedor->tipo}}</td>
                    <td>{{$proveedor->calificacion}}</td>
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->cif}}</td>
                    <td>{{$proveedor->telefono}}</td>
                    <td>{{$proveedor->email}}</td>
                    <td><x-jet-button onclick="location.href ='{{ route('proveedores.edit', $proveedor) }}'">{{ __('Edit') }}</x-jet-button></td>
                    <td><x-jet-danger-button onclick="location.href ='{{ route('proveedores.show', $proveedor) }}'">{{__('Show')}}</x-jet-danger-button></td>
            </tr>

            </tbody>
            @empty
            <div class="alert alert-danger">@lang('No hay proveedores para esta comunidad')</div>
            @endforelse
        </table>
    @else
        <h1>@lang('No hay proveedores para esta comunidad todavía')</h1>
    @endif
</x-app-layout>

