<x-app-layout>

@if($activeCommunity->nombreRole(auth()->user()->id) == 'admin')

    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('proveedores.store') }}">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('New Provider') }}
            </h2>
            <hr>
        </x-slot>

        @include('proveedores._form', ['btnText1' =>'Save', 'btnText2' => 'Cancel'])
    </form>
@else
	<div class="alert alert-warning">
        <p>No tienes permisos para ver los proveedores de esta comunidad</p>
    </div> 
@endif
</x-app-layout>