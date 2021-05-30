<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger btn-lg btn-block mt-0']) }}>
    {{ $slot }}
</button>
