<div class="card">

    @if (!empty($actions))
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="" />
                </div>
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                {!! $moreHtmlActions !!}
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0  fw-semibold ">
                    <li class="nav-item ms-auto">
                        <a href="" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            {{ ucwords(trans('words.actions')) }}
                            <span class="svg-icon svg-icon-2 me-0"></span>
                        </a>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6"
                            data-kt-menu="true">
                            <div class="menu-item px-5">
                                <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">
                                    {{ ucwords(trans('words.actions')) }}</div>
                            </div>
                            @if (isCleanArray($actions))
                                @foreach ($actions as $action)
                                    <x-table.action :id="$id()" :action="$action" />
                                @endforeach
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    <div class="card-body py-4">
        <div class="table-responsive">
            <table @if (isset($identifier)) mrx-dt-id="{{ $identifier }}" @endif
                class="table align-middle table-row-dashed fs-6 gy-4" id="{{ $id() }}">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                        @if ($showCheckBoxes)
                            <th class="no-sort  w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input id="{{ $inputCheckAllId() }}" class="form-check-input" type="checkbox"
                                        value="1" />
                                </div>

                            </th>
                        @endif

                        @foreach ($heads as $head)
                            <th class="min-w-100px">{{ $head->getShowAs() }}</th>
                        @endforeach

                        <th class="no-sort ">
                            {{ ucwords(trans('words.actions')) }}
                        </th>

                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">

                    @if (isCleanArray($dataCollection->toArray()))

                        @foreach ($dataCollection as $model)
                            <tr mrx-dt-tr-id="{{ \Illuminate\Support\Str::random(8) }}">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input {{ $generateTbodyInputCheckboxClass() }}"
                                            name="check[]" type="checkbox" value="{{ $model[$model::PK] }}"
                                            />
                                    </div>
                                </td>
                                @if (isCleanArray($heads))
                                    @foreach ($heads as $head)
                                        <td data=" {{ $model[$head->getName()] }}">

                                            @switch($head->getType())
                                                @case(\App\Helpers\Components\Head::TYPE_TEXT)
                                                    {{ $model[$head->getName()] }}
                                                @break

                                                @case(\App\Helpers\Components\Head::TYPE_IMG)
                                                    <div class="d-flex align-items-center">

                                                        <div class="symbol symbol-50px me-3">
                                                            <x-media.imaage
                                                                :alt="$model[$head->getName()]"
                                                                :src="$image($model[$head->getName()])" />

                                                        </div>
                                                    </div>
                                                @break

                                                @case(\App\Helpers\Components\Head::TYPE_OPTIONS)
                                                    @foreach ($head->getOptions() as $key => $val)
                                                        @if ($model[$head->getName()] == $key)
                                                            {!! $val !!}
                                                        @endif
                                                    @endforeach
                                                @break

                                                @case(\App\Helpers\Components\Head::TYPE_FILE)
                                                    @php
                                                        $html = '';
                                                        if (!empty($model[$head->getName()]) && Storage::disk('local')->has($model[$head->getName()])) {
                                                            $filePath = pathinfo(storage_path($model[$head->getName()]))['basename'];
                                                            $fileSize = byteConvert(Storage::disk('local')->size($model[$head->getName()]));
                                                            $html = "<div> nom de fichier  :<span class='badge badge-secondary'>$filePath</span>  </div> <div>size :<span class='badge badge-secondary'>$fileSize</span>   </div>";
                                                        }
                                                    @endphp
                                                    {!! $html !!}
                                                @break

                                                @case(\App\Helpers\Components\Head::TYPE_DATE)
                                                    @if (isset($model[$head->getName()]) && \Carbon\Carbon::parse($model[$head->getName()])->isValid())
                                                        @if (isset($head->getOptions()['format']))
                                                            {{ \Carbon\Carbon::parse($model[$head->getName()])->translatedFormat($head->getOptions()['format']) }}
                                                        @else
                                                            {{ $model[$head->getName()] }}
                                                        @endif
                                                    @endif
                                                @break
                                            @endswitch
                                        </td>
                                    @endforeach
                                @endif
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm d-flex"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        {{ ucwords(trans('words.actions')) }}

                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        @if (!empty($editRoute) || !empty($deleteRoute) || (isset($moreRoutes) && count($moreRoutes)))
                                            @if (isset($editRoute) && !empty($editRoute))
                                                <div class="menu-item px-3">
                                                    <a href="{{ $route($model, $editRoute) }}" class="menu-link px-3">
                                                        {{ ucwords(trans('words.edit')) }}</a>
                                                </div>
                                            @endif
                                            @if (isset($deleteRoute) && !empty($deleteRoute))
                                                <div class="menu-item px-3 ">
                                                    <a href="{{ $route($model, $deleteRoute) }}"
                                                        class="menu-link px-3 text-danger delete-record">
                                                        {{ ucwords(trans('words.delete')) }}</a>
                                                </div>
                                            @endif
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        @php
            $url = match (app()->getLocale()) {
                'ar' => config('configs.dt_lang_ar'),
                'fr' => config('configs.dt_lang_fr'),
                'en' => config('configs.dt_lang_en'),
            };
        @endphp
        var dataTable = $('#{{ $id() }}').DataTable({
            "language": {
                'url': "{{ $url }}",
            },
            "info": false,
            "bLengthChange": false, //thought this line could hide the LengthMenu
            "bInfo": false,
            'order': [],
            'pageLength': 10,
            "lengthMenu": [5, 10, 15, 20],
            "columnDefs": [{
                    targets: 'no-sort',
                    orderable: false,
                    "order": []
                }

            ]
        });
        $('[data-kt-user-table-filter="search"]').on('keyup', function() {
            console.log(dataTable)
            dataTable.search($(this).val()).draw();
        });

        $("#{{ $inputCheckAllId() }}").click(function() {
            $(".{{ $generateTbodyInputCheckboxClass() }}").prop("checked", $(this).prop("checked"));
        });
        $('.delete-record').on('click', function(e) {
            var href = $(this).attr('href');
            e.preventDefault();
            Swal.fire({
                    title: 'Es-tu sûr?',
                    text: "Vous ne pourrez pas revenir en arrière",
                    icon: 'warning',

                    showCancelButton: true,
                    cancelButtonText: "{{ trans('words.cancel') }}",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ trans('words.delete') }}'
                })
                .then(function(result) {
                    if (result.value) {
                        location.href = href;
                    }
                });
        });
        $('.{{ $id() }}-delete-selected-rows').on('click', function(e) {

            e.preventDefault();


            window.ids = [];

            window.href = $(this).attr("app-dt-action-href");



            $(".{{ $generateTbodyInputCheckboxClass }}:checked").each(function() {
                window.ids.push($(this).prop("value"));
            });


            if (window.ids.length) {
                Swal.fire({
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        title: '{{ trans('messages.sure_message') }}',
                        text: "{{ trans('messages.confirm_delete_message') }}",

                        icon: 'warning',
                        cancelButtonText: "{{ trans('words.cancel') }}",
                        showCancelButton: true,
                        confirmButtonText: '{{ trans('words.confirm') }}',
                    })
                    .then(function(result) {
                        if (result.value) {
                            axios.post(window.href, {
                                    'ids': window.ids,
                                })
                                .then(function(response) {
                                    location.reload();
                                })
                                .catch(function(error) {
                                    console.log(error)
                                });
                        }
                    });
            }
        });
    </script>
@endpush
