<x-app-layout>
@section('title','listaPropietarios')

@section('content')


<h1 class="text-center mb-4">Lista propietarios del grupo {{$grupo[0]['nombre']}}</h1>

<a href="{{route('distribucion.index')}}" class="btn btn-primary mx-5 mb-4">Volver</a>

<table class="table col-md-11 mx-5">
    <thead>
        <tr class="text-white bg-dark">
           <!-- <th scope="col">Propietario</th>-->
            <th scope="col">Propiedad</th>
            <!--<th scope="col">Coeficiente</th> -->
            <!-- <th scope="col">Unidad Registral</th> -->
            @if ($movimientos->count())
                <th scope="col">{{$movimientos[0]['distribucion']}}</th> 
                @else
                <th scope="col">Coeficiente</th>
                <th scope="col">Unidad Registral</th>
            @endif
            
        </tr>
    </thead>

    <tbody>
        
       @if($propietarios->count())       
        @foreach ($propietarios as $propietario)
            @if($movimientos->count())
            <tr>
                <!--<td>{{$propietario->nombres}}</td>-->
                <td>{{$propietario->propiedad}}</td>
                <td>{{$propietarios[0][$movimientos[0]['distribucion']]}}</td>
            </tr>
            @else
            <tr>
                <!--<td>{{$propietario->propietario}}</td>-->
                <td>{{$propietario->propiedad}}</td>
                <td>{{$propietario->coeficiente}}</td>
                <td>{{$propietario->unidadRegistral}}</td>
            </tr>
            @endif
        @endforeach
        
        @else
            <tr>
                <td>No hay Registros</td>
                
            </tr>    
        @endif
    </tbody>
</table>

</x-app-layout>


