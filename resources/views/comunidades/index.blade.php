<x-app-layout>
    
    @include('partials.session-status')

    @if( $user->comunidades->count() < $user->MaxFreeCommunities)
    <x-jet-button onclick="location.href ='{{ route('comunidades.create') }}'">@lang('New')</x-jet-button>
    @endif

    @if ($user->comunidades->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('cif')</th>
                <th>@lang('denom')</th>
                <th>@lang('president')</th>
                <th>@lang('secretary')</th>
                <th>@lang('responsable')</th>
                <th>@lang('actions')</th>
            </tr>
        </thead>
        @forelse($user->comunidades as $comunidad )
        <tbody>
            <tr>
                <td>{{$comunidad->cif}}</td>
                <td>{{$comunidad->denom}}</td>
                <td>{{$comunidad->president}}</td>
                <td>{{$comunidad->secretary}}</td>
                <td>{{$comunidad->responsable}}</td>
                <td class="flex border-0">
                    @if (! Session::has('activeCommunity'))
                        <x-jet-button class="mx-2" onclick="location.href ='{{ route('comunidades.select', $comunidad) }}'">{{ __('Select') }}</x-jet-button>
                    @endif
                        <x-jet-danger-button onclick="location.href ='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button>
                </td>
        </tr>
        </tbody>
        @empty
        @include('partials.alert-notcreatedyet')
        @endforelse
    </table>
    
    @else
    @include('partials.alert-notcreatedyet')
    @endif

    {{-- $comunidades->links() --}}
</x-app-layout>