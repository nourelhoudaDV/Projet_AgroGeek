<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/init.js') }}"></script>
{{--@env('local')--}}
{{--    <script src="http://localhost:35729/livereload.js"></script>--}}
{{--@endenv--}}
@if(session()->has('alert'))

    <script>

        Swal.fire({
            text: "{{ session()->get('alert')['text'] ?? '' }}",
            title: "{{ session()->get('alert')['title'] ?? '' }}",
            icon: "{{ session()->get('alert')['icon'] }}",
            buttonsStyling: false,
            confirmButtonText: "{{ trans('words.close') }}",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    </script>
@endif
@stack('scripts')
