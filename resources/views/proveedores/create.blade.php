<x-app-layout>
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('proveedores.store') }}">
        <h1 class="display-4"> @lang('New Provider') </h1>
        <hr>

        @include('proveedores._form', ['btnText1' =>'Save', 'btnText2' => 'Cancel'])
    </form>
</x-app-layout>