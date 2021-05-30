<x-app-layout>

@section('title','Distribucion de gastos')

@section('content')
<h1 class="text-center m-40">Lista distribucion de gastos</h1>
    
<div class="position-relative">

<form action="{{ url('distribucion/create') }}">
@csrf 

<button class="btn btn-primary mx-5 mb-4">Crear</button>

    @if (session ('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
  
        </div>
    @endif

<table class="table col-md-11 mx-5">
    <thead>
        <tr class="text-white bg-dark">
            <th scope="col">Nombre</th>
            <th scope="col">Abreviatura</th>
            <th scope="col">orden</th>
            <th scope="col">Lista de propietarios</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
            
    <tbody>
        @if($distribucion->count())
        @foreach($distribucion as $distribucio)
        <tr>
            <td>{{$distribucio->nombre}}</td>
            <td>{{$distribucio->abreviatura}}</td>
            <td>{{$distribucio->orden}}</td>
            <td>
                <form>
                    <a href="{{route('distribucion.show',$distribucio->nombre)}}"  type="submit" name='lista' value="{{$distribucio->nombre}}" class="btn btn-info">Propiedades</a> 
                </form>
            </td>

            <td>    

                <a href="{{route('distribucion.edit',$distribucio->nombre)}}"  class="btn btn-dark btn-sm">Editar</a>


                <form action="{{route('distribucion.destroy',$distribucio->nombre)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                </form>


            </td>

        </tr>
        @endforeach
        @else
            <tr>
                <td>No hay Registros</td>
            </tr>
    @endif
    </tbody>

</x-app-layout>