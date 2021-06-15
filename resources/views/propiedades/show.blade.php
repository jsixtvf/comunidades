<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>@lang('Show Propiedad')</h2>
                        </div>

                        <x-jet-validation-errors></x-jet-validation-errors>
                    </div>
                </div>
                    <div class="inline-flex">
                        <x-jet-danger-button onclick="location.href='{{ route('propiedades.edit',$propiedad->id) }}'">@lang('Edit')</x-jet-danger-button>
                    @csrf
                    @method('PUT')
                    </div>
                    <div class="inline-flex">
                        <x-jet-button  onclick="location.href ='{{ route('propiedades.index') }}'"> @lang('Cancel')</x-jet-button>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre de la propiedad:</strong>
                                <div type="text" name="nombre" class="form-control" >{{ $propiedad->nombre }}</div>
                            </div>
                            <div class="form-group">
                                <strong>Propietario:</strong>
                                <div type="text" name="propietario" class="form-control" >{{ $propiedad->propietario }}</div>
                            </div>
                               <div class="form-group">
                                <strong>Parte:</strong>
                                <div type="text" name="parte" class="form-control" >{{ $propiedad->parte }}</div>
                            </div>
                              <div class="form-group">
                                <strong>Coeficiente:</strong>
                                <div type="integer" name="coeficiente" class="form-control" >{{ $propiedad->coeficiente }}</div>
                            </div>
                               <div class="form-group">
                                <strong>Tipo:</strong>
                               <div class="form-control" name="tipo">{{ $propiedad->tipo }}</div>
                             <div class="form-group">
                                <strong>Observaciones:</strong>
                                <div type="textarea" name="observaciones" class="form-control" >{{ $propiedad->observaciones }}</div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</x-app-layout>