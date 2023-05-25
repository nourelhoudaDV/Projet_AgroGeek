<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
        {{ $pageTittle }}
    </h1>
    <ol class="breadcrumb text-muted fs-6 fw-semibold">
        @if (request()->is('/'))
            <li class="breadcrumb-item text-muted" > {{ ucwords('home') }}</li>
        @else
            <li class="breadcrumb-item">
                <a href="/" class="" style="color:#5EC267">
                    {{ ucwords(trans('words.Home')) }}
                </a>
            </li>
        @endif

        @if(isCleanArray($indexes))
            @foreach($indexes as $index)
                @if(isset($index['current']) && $index['current'])
                        <li class="breadcrumb-item text-muted"> {{ ucwords($index['name']) }}</li>
                @elseif(url()->current() == $index['route'])
                    <li class="breadcrumb-item text-muted"> {{ ucwords($index['name']) }}</li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ $index['route'] ?? '#' }}" class="" style="color:#5EC267">
                            {{ ucwords($index['name']) }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif


    </ol>
</div>
