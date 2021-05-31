<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Product</h2>
                        </div>

                        <x-jet-validation-errors></x-jet-validation-errors>
                    </div>
                </div>

                <form action="{{ route('propiedades.update',$propiedad->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="inline-flex">
                        <x-jet-button class="mx-2">@lang('Edit')</x-jet-button>
                        <x-jet-danger-button  onclick="location.href ='{{ route('propiedades.index') }}'"> @lang('Cancel')</x-jet-danger-button>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre de la propiedad:</strong>
                                <input type="text" name="nombre" value="{{ $propiedad->nombre }}" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <strong>Propietario:</strong>
                                <input type="text" name="propietario" value="{{ $propiedad->propietario }}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>