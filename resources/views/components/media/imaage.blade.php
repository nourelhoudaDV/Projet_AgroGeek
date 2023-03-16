
    <img
        @if($lazyload)
            src="{{ $loaderPath }}"
            data-src="{{ $src }}"
        @else
            src="{{ $src }}"
        @endif
        {{$attributes->merge(['class' => 'img-fluid lazyload '])}}
        alt="{{ $alt }}"
/>
