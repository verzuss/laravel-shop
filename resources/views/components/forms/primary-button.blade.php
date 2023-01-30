<button 
    {{ $attributes->class(["w-full btn btn-pink"]) }}
    {{ $attributes->merge() }}
>
    {{ $slot }}
</button>