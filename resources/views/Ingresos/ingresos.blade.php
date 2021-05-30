<x-app-layout>
@section('title','ingresos')

@section('content')
<h1 class="text-center">Lista de Ingresos</h1>

<table class="table col-md-11 mx-5">
    <thead class="text-white bg-dark">
        <tr>
            <th scope="col">Fecha Alta</th>
            <th scope="col">Cuenta</th>
            <th scope="col">Fecha Valor</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Propiedad</th>
            <th scope="col">Lista de gastos</th>
        </tr>
    </thead>

    <tbody>
        @if ($ingresos->count())
        @foreach ($ingresos as $ingreso)
            <tr>
                <td>{{$ingreso->fechaAlta}}</td>
                <td>{{$ingreso->cuenta}}</td>
                <td>{{$ingreso->fechaValor}}</td>
                <td>{{$ingreso->cantidad}}</td>
                <td>{{$ingreso->propiedad}}</td>
                <td>
                    <a href="{{route('listaMovimientos.index',['propiedad' => $ingreso->propiedad])}}" type="submit" name="propiedad" value="{{$ingreso->propiedad}}" class="btn btn-info">Gastos</a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

</x-app-layout>