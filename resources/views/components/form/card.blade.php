<div class="{{ $attributes->get('col') }}">
    <div class="card card-flush   ">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ $attributes->get('title') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="row">
                {!!  $slot !!}
            </div>
        </div>
    </div>
</div>
