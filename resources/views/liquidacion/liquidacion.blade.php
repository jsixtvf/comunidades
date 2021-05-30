@extends('layauts/plantilla')

@section('title','Liquidación')

@section('content')
        <h1 class="text-center">Liquidación</h1>
    
    <form action="{{ route('liquidacion.store') }}" method="POST">
        @csrf
        @method('POST')

    <div class="row mx-3">
        <button class="btn btn-primary col-md-1 mx-3 mb-3">Guardar</button>
        
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" name="tipo" >
        <option value="gastovencido" name="gastovencido">Gasto vencido</option>
        <option value="presupuesto" name="presupuesto">Presupuesto</option>
        <option value="presupuestocuotas" name="presupuestocuotas">Presupuesto por Cuotas</option>
        </select>
        
        <label for="desde" class="form-label">Desde</label>
        <input type="date" class="form-control" name="desde">

        <label for="hasta" class="form-label">Hasta</label>
        <input type="date" class="form-control" name="hasta">
    </div>

    </form>
@endsection
