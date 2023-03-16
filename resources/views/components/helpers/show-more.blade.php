<div>

@if( !empty($text) && strlen($text) > 40 )
    <span id='dsfds' class="show-more-wrapper"  data-show-more="{{ $text }}">
        {{ substr( trim(strip_tags($text)), 0, 40) }}
        <span data-bs-toggle="tooltip" data-placement="top" title="montre plus de text"
              class="show-more-text text-primary cursor-pointer text-decoration-underline">...</span>
    </span>
@else
    <span >
        {{ $text }}
    </span>
@endif

</div>




