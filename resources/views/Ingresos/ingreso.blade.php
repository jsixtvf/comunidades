<x-app-layout>

@section('title','Ingresos')

@section('content')
<h1 class="text-center">Ingreso</h1>

<form action="{{ route('ingreso.store') }}" method="POST">
    @csrf
    @method('POST')

    <button class="btn btn-primary col-md-1 mx-4 mb-3">Guardar</button>

    <div class="row mx-3 mb-4">
        <label for="fecha" class="form-label">Fecha actual</label>
        <input type="text" class="form-control" value="{{old('fecha',$fecha)  }}" name="fecha" >
    </div>

    <div class="row mx-3 mb-4">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" class="form-control" name="cantidad" value="{{old('cantidad')}}">
         @error('cantidad')
             <br>
             {{$message}}
             <br>
         @enderror
    </div>

    <div class="row mx-3 mb-4">
        <label for="Cuenta" class="form-label">Cuenta</label>
        <select class="form-select" name="cuenta">
    @if($cuentas->count())
        @foreach($cuentas as $cuenta)
            <option value="{{ $cuenta->cuenta }}" name="{{ $cuenta->cuenta }}">{{ $cuenta->cuenta }}</option>
        @endforeach
     @else
        <option value="" name="">No hay cuentas</option>
    @endif
        </select>
    </div>

    <div class="row mx-3 mb-4">
        <label for="Propietario" class="form-label">Propietario</label>
        <select name="Propietario" class="form-select">Propietario
    @if($propietarios->count() )
        @foreach ($propietarios as $propietario)
            <option value="{{ $propietario -> Nombre }}" name="{{ $propietario -> Nombre }}"> {{ $propietario->Nombre }}</option>
        @endforeach
     @else
         <option value="" name="">No hay propietarios</option>
    @endif
            </select>
    </div>
    
</form>
</x-app-layout>

