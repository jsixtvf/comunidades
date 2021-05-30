<x-app-layout>

@section('title','Editar Movimientos')
@section('content')
<h1 class="text-center">Editar Movimientos</h1>

<form action="{{ route('movimientos.update',$movimiento->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button class="btn btn-primary col-md-1 mx-4 mb-3">Editar</button>

    <div class="row mx-4">

    <div class="col-md-4 mb-2" >
        <label for="fechaAlta" class="form-label">Fecha Alta</label>
        <input type="text" class="form-control" value="{{ old('fechaAlta',$movimiento->fechaAlta)}}" name="fechaAlta">
        @error('fechaAlta')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="grupo" class="form-label">Grupos</label>
        <select class="form-select" name="grupo">
            @if($grupos->count())
                <option value=""></option>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->nombre }}" @if ($movimiento->grupo)  selected  @endif name="{{ $grupo->nombre }}">{{ $grupo->nombre }}</option>
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
                                        
            <option value="coeficiente" @if ($movimiento->distribucion == 'coeficiente')  selected  @endif name="coeficiente">Coeficiente</option>
            <option value="unidadRegistral" name="unidadRegistral" @if ($movimiento->distribucion == 'unidadRegistral')  selected  @endif>UnidadRegistral</option>          
        </select>
    </div>


    <div class="col-md-4">
        <label for="fechaValor" class="form-label">Fecha valor</label>
        <input type="date" class="form-control"  name="fechaValor" value="{{old('fechaValor' ,$movimiento->fechaValor)}}">
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
            <option value="agua" @if ($movimiento->concepto == 'agua')  selected  @endif name="agua" >Agua</option>
            <option value="Alcantarillado" @if ($movimiento->concepto == 'Alcantarillado')  selected  @endif name="Alcantarillado">Alcantarillado</option>
            <option value="Ascensor" @if ($movimiento->concepto == 'Ascensor')  selected  @endif name="Ascensor" >Ascensor</option>
            <option value="Basuras" @if ($movimiento->concepto == 'Basuras')  selected  @endif name="Basuras" >Basuras</option>
            <option value="Electricidad" @if ($movimiento->concepto == 'Electricidad')  selected  @endif  name="Electricidad" >Electricidad</option>
            <option value="Gas" @if ($movimiento->concepto == 'Gas')  selected  @endif name="Gas" >Gas</option>
            <option value="limpiezaEscalera" @if ($movimiento->concepto == 'limpiezaEscalera')  selected  @endif name="limpiezaEscalera" >Limpieza escalera</option>
            <option value="limpiezaGarage" @if ($movimiento->concepto == 'limpiezaGarage')  selected  @endif name="limpiezaGarage" >Limpieza Garage</option>
            <option value="limpiezaJardin" @if ($movimiento->concepto == 'limpiezaJardin')  selected  @endif name="limpiezaJardin" >Limpieza Jardin</option>
            <option value="piscina" @if ($movimiento->concepto == 'piscina')  selected  @endif name="piscina" >Piscina</option>
            <option value="porteria" @if ($movimiento->concepto == 'porteria')  selected  @endif name="porteria" >Porteria</option>
            <option value="ingreso" @if ($movimiento->concepto == 'ingreso')  selected  @endif name="ingreso" >Ingreso</option>

        </select>
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
        <textarea class="form-control" name="observaciones" rows="2">  {{'observaciones',$movimiento->observaciones}}</textarea>
        @error('observaciones')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
</div>
</form>
</x-app-layout>