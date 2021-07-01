<x-app-layout>

@if($activeCommunity->nombreRole(auth()->user()->id) == 'admin')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('comunidades.update', $comunidad) }}">
                    @csrf @method('PATCH')

                    <h1 class="display-4"> {{ __($title) }} </h1>
                    <hr>

                    @include('comunidades._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])

                </form>
            </div>
        </div>
    </div>
@else 
    <div class="alert alert-warning">
        <p>No tienes permisos para editar en esta comunidad</p>
    </div> 
@endif

</x-app-layout>