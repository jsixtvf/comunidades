<x-app-layout>

@section('title','Ficha del mivimiento')

@section('content')
<h1 class="text-center">Ficha del movimiento</h1>

<form action="{{ route('movimientos.store') }}" method="POST">
    @csrf
    @method('POST')
    <button class="btn btn-primary col-md-1 mx-4 mb-3">Guardar</button>

    <div class="row mx-4">

    <div class="col-md-4 mb-2" >
        <label for="fechaAlta" class="form-label">Fecha Alta</label>
        <input type="text" class="form-control" value="{{ date('Y-m-d')}}" name="fechaAlta">
        @error('fechaAlta')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="cuenta" class="form-label">Cuenta</label>
        <select class="form-select" name="cuenta">
            @if($movimientos->count())
                @foreach($movimientos as $movimiento)
                    <option value="{{ $movimiento->cuenta }}" {{(old('cuenta') == $movimiento->cuenta) ? 'selected' : '' }} name="{{ $movimiento->cuenta }}">{{ $movimiento->cuenta }}</option>
                @endforeach
             @else
             <option value="" name="">No hay cuentas</option>
            @endif
        </select>
    </div>

    <div class="col-md-4">
        <label for="grupo" class="form-label">Grupos</label>
        <select class="form-select" name="grupo">
            @if($grupos->count())
                <option value=""></option>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->nombre }}" {{(old('grupo') ==  $grupo->nombre)  ? 'selected': '' }} name="{{ $grupo->nombre }}">{{ $grupo->nombre }}</option>
                @endforeach
             @else
             <option value="" name="">No hay grupos de distribucion</option>
            @endif
        </select>
    </div>


    <div class="col-md-4">
        <label for="distribucion" class="form-label">Distribucion</label>
        <select class="form-select" name="distribucion">
            <option value=""></option>
            <option value="coeficiente" {{(old('distribucion') == 'coeficiente')  ? 'selected': '' }} name="coeficiente">Coeficiente</option>
            <option value="unidadRegistral" name="unidadRegistral" {{(old('distribucion') == 'unidadRegistral') ? 'selected': ''}}>UnidadRegistral</option>          
        </select>
    </div>


    <div class="col-md-4">
        <label for="fechaValor" class="form-label">Fecha valor</label>
        <input type="date" class="form-control"  name="fechaValor" value="{{old('fechaValor')}}">
        @error('fechaValor')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="concepto" class="form-label">Concepto</label>
        <select class="form-select" name="concepto" >
            <option value=""></option>
            <option value="agua" {{(old('concepto') == 'agua') ? 'selected' : ''}} name="agua" >Agua</option>
            <option value="Alcantarillado" {{ (old('concepto') == 'Alcantarillado')  ? 'selected': '' }} name="Alcantarillado">Alcantarillado</option>
            <option value="Ascensor" {{(old('concepto') == 'Ascensor') ? 'selected' : ''}} name="Ascensor" >Ascensor</option>
            <option value="Basuras" {{(old('concepto') == 'Basuras') ? 'selected' : ''}} name="Basuras" >Basuras</option>
            <option value="Electricidad" {{(old('concepto') == 'Electricidad') ? 'selected' : ''}} name="Electricidad" >Electricidad</option>
            <option value="Gas" {{(old('concepto') == 'Gas') ? 'selected' : ''}} name="Gas" >Gas</option>
            <option value="limpiezaEscalera" {{(old('concepto') == 'limpiezaEscalera') ? 'selected' : ''}} name="limpiezaEscalera" >Limpieza escalera</option>
            <option value="limpiezaGarage" {{(old('concepto') == 'limpiezaGarage') ? 'selected' : ''}} name="limpiezaGarage" >Limpieza Garage</option>
            <option value="limpiezaJardin" {{(old('concepto') == 'limpiezaJardin') ? 'selected' : ''}} name="limpiezaJardin" >Limpieza Jardin</option>
            <option value="piscina" {{(old('concepto') == 'piscina') ? 'selected' : ''}} name="piscina" >Piscina</option>
            <option value="porteria" {{(old('concepto') == 'porteria') ? 'selected' : ''}} name="porteria" >Porteria</option>
            <option value="ingreso" {{(old('concepto') == 'ingreso') ? 'selected' : ''}} name="ingreso" >Ingreso</option>

        </select>
    </div>


    <div class="col-md-4">
        <label for="propiedad" class="form-label">Propiedad</label>
        <select name="propiedad" class="form-select">Propiedad
        @if ($propiedades->count())
            <option value=""></option>
            @foreach ($propiedades as $propiedad)
                <option value="{{$propiedad->propiedad}}" {{(old('propiedad') == $propiedad->propiedad ? 'selected' : '')}} name="{{$propiedad->propiedad}}">{{$propiedad->propiedad}}</option>
            @endforeach
            @else
                <option value="">No hay propiedades</option>
        @endif

        @error('propiedad')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" value="{{old('cantidad' ,$movimiento->cantidad)}}" placeholder="0.00">
        @error('cantidad')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>


    <div class="col-md-4 mb-3">
        <label for="obsevaciones" class="form-label">Obsevaciones</label>
        <textarea class="form-control" name="observaciones" rows="2">  {{old('observaciones',$movimiento->observaciones)}}</textarea>
        @error('observaciones')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
</div>
</form>
</x-app-layout>
