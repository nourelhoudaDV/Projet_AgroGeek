@push("plugin-styles")
    <link href="{{ asset('assets/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <style>
        .content-comp {
            background-color: rgb(0 0 0 / 15%) !important;
        }

        .select2 {
            width: 100% !important;
        }

        .attached-files {
            text-align: center;
            width: 140px;
            position: relative;
            border: 1px solid #e4e4e4;
            padding: 10px;
            border-radius: 10px;
            display: none;
            margin-bottom: 20px;
        }

        .attached-files img {
            height: 100px;
            width: 100px;
            object-fit: contain;
            border-radius: 10px;
        }

        .attached-files label {
            display: block;
            margin-top: 10px;
            font-size: 12px;
            margin-bottom: 0px;
        }

        .attached-files span.delete-label {
            position: absolute;
            top: -6px;
            background: #e91e7c;
            height: 20px;
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            border-radius: 50%;
            right: -5px;
        }

        /* Dropzone */
        #dropzone .dropzone .dz-message .dz-button {
            font-size: 23px;
            font-weight: 300;
            color: #2262c6;
        }

        #dropzone .dropzone span.note.needsclick {
            font-weight: 300;
        }

        #dropzone .dropzone {
            border: 2px dashed hsla(217, 71%, 45%, 0.38);
        }

        #dropzone .dropzone .dz-preview.dz-error:hover .dz-error-message {
            opacity: 0;
            pointer-events: auto;
        }

        #dropzone .dropzone .dz-preview.dz-error .dz-error-mark {
            opacity: 0;
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
            top: 60%;
            border-color: #000000 transparent transparent transparent !important;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            width: 0;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
        }

        .options {
            margin: 10px 0 0 0;
        }

        @media only screen and (max-width: 768px) {
            .options {
                margin: -10px 0 0 0;

            }
        }

        .clear-tempusdominus {
            position: absolute;
            right: 19px;
            top: 8px;
            padding: 4px;
            border-radius: 100%;
            text-align: center;
            font-size: 13px;
        }

        .clear-tempusdominus:hover {
            background: #d5d5d5;
            border-radius: 100%;
            text-align: center;
        }

       .toggle > input[type=checkbox] {
            display: block !important;
            visibility: hidden !important;
        }
        input[type='button'].btn-toggle {
            background: #23b9ff;
        }
        .form-control.is-invalid, .was-validated .form-control:invalid{
            border-color: #f41127 !important;

        }
              .hide-textarea-comp-btn {
            padding: 0.1rem;
            width: 22px;

            height: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 100%;
            width: 30px;
            height: 27px;
            text-align: center;
            vertical-align: middle;
            background-color: #efefef;
        }

        .hide-textarea-comp-btn:hover {
            background-color: #cdcdcd;
        }

        .select2{
            margin-top: -12px !important;
        }

    </style>
@endpush




@push("plugin-scripts")

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    {{--    // <script src="{{ asset('assets/plugins/datetimepicker/js/legacy.js') }}"></script>--}}
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.time.js') }}"></script>
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script
        src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>



    <script>
        (function () {
            'use strict'


  $('.hide-textarea-comp-btn').on('click', function () {
                let $this = $(this);
                let ck = $this
                    .closest('.comp-title')
                    .siblings('.comp-content');

                if ($this.attr('data-comp-visibility') == 0) {
                    ck.fadeIn();
                    $this.attr('data-comp-visibility', 1);
                    $this.find('i')
                        .removeClass('bx-show')
                        .addClass('bx-hide');
                } else {
                    ck.fadeOut();
                    $this.attr('data-comp-visibility', 0);
                    $this.find('i')
                        .removeClass('bx-hide')
                        .addClass('bx-show');
                }


            });
            // validations
            // file upload
            $('.file-upload').on('change', function (e) {
                let $this = $(this);
                let attachedFileEl = $this.siblings('.attached-files');
                let imgPreviewEl = attachedFileEl.find('img');
                let fileIconEl = attachedFileEl.find('.file-icon');
                let fileNameEl = attachedFileEl.find('.file-name');
                let parent = $(this).closest('.content-comp');
                let invalidFeedbackEl = parent.siblings('.invalid-feedback');

                fileNameEl.text($this.get(0).files[0].name)
                attachedFileEl.removeClass("d-none").addClass("d-block");

                let blobUrl = URL.createObjectURL(e.target.files.item(0));
                if (isImage(fileExt($this.val()))) {
                    fileIconEl.addClass('d-none');
                    imgPreviewEl.removeClass('d-none').attr('src', blobUrl);
                    // invalidFeedbackEl.text('');
                } else {
                    imgPreviewEl.addClass('d-none').attr('src', '');
                    fileIconEl.removeClass('d-none');
                    // invalidFeedbackEl.text('');
                }
            });

            function fileExt(fileName) {
                return fileName.split('.').pop().toLowerCase();
            }

            function isImage($fileExt) {
                return ['png', 'jpg', 'jpeg'].includes($fileExt);
            }

            $('.attached-files').on('click', '.delete-label', function (event) {
                let attachedFileEl = $(this).closest('.attached-files');
                attachedFileEl.find('input[type="hidden"]').val('');
                attachedFileEl
                    .removeClass("d-block")
                    .addClass("d-none")
                    .children('img')
                    .attr('src', '');

            });


            $('.options').each(function () {
                let $this = $(this);
                console.log($this)
                let childs = $this.find('input[type="checkbox"]');
                let min = $this.attr('minimum-selection');
                $.map(childs, function (val, i) {
                    $(val).on('change', function () {
                        let childCheckedCount = $this.find('input[type="checkbox"]:checked').length;
                        if (childCheckedCount >= min) {
                            $.map(childs, function (val, i) {
                                $(val).prop('required', false)
                            });
                        } else {
                            $.map(childs, function (val, i) {
                                $(val).prop('required', true)
                            });
                        }
                    })
                });
            });

            $('select[required]').on('change', function () {
                validateSelect($(this));
            });

            function validateSelect(element) {
                let selectSelection = element.siblings('.select2')
                    .find('.select2-selection__rendered');
                if (element.val()) {
                    selectSelection
                        .css({
                            border: '1px solid #bfc9d4'
                        });
                    return true;
                } else {
                    selectSelection
                        .css({
                            border: '1px #f41127 solid'
                        });
                    return false;

                }
            }

            //
            // $('.select2').on('change', function () {
            //     let $this = $(this);
            //     $this.on('change',)
            //     if ($this.prop('required') && $this.val() === '') {
            //         $this.css({
            //             border: '1px #f41127 solid'
            //         });
            //     } else {
            //         $this.css({
            //             border: '1px solid #bfc9d4'
            //         });
            //     }
            // });


            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');


            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    console.log(form)

                    form.addEventListener('submit', function (event) {


                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }


                        $(form).find('.options').each(function () {
                            let $this = $(this);
                            console.log($this)
                            let childs = $this.find('input[type="checkbox"]')
                            let childCheckedCount = $this.find('input[type="checkbox"]:checked').length;
                            let min = $this.attr('minimum-selection');
                            if (childCheckedCount >= min) {
                                $.map(childs, function (val, i) {
                                    $(val).prop('required', false)
                                });
                            } else {
                                $.map(childs, function (val, i) {
                                    $(val).prop('required', true)
                                });
                                event.stopPropagation()
                                event.preventDefault();
                            }
                        });


                        $(form).find('select[required]').each(function () {
                            if (!validateSelect($(this))) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                        });


                        // $(form).find('.select2').each(function () {
                        //     let $this = $(this);
                        //     if ($this.prop('required') && $this.val() === '') {
                        //         $this.css({
                        //             border: '1px #f41127 solid'
                        //         });
                        //     } else {
                        //         $this.css({
                        //             border: '1px solid #bfc9d4'
                        //         });
                        //     }
                        // });


                        // $('.tempus-dominus[required]').each(function () {
                        //     let $this = $(this);
                        //     if ($this.val() == 'Invalid date') {
                        //         $this.css({
                        //             border: '1px #f41127 solid'
                        //         });
                        //         event.stopPropagation()
                        //         event.preventDefault();
                        //     } else {
                        //
                        //         $this.css({
                        //             border: '1px solid #bfc9d4'
                        //         });
                        //     }
                        // });


                        form.classList.add('was-validated')
                    }, false)
                })


            // inits

            // select 2
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

        })();


        (function () {

            'use strict';
            let interval = 100;

            const x = setInterval(() => {
                let swipeBtnEl = $('.Hidden');
                if (swipeBtnEl.length) {
                    swipeBtnEl.foreach(function () {
                        let $this = $(this);
                        if ($this.text() === 'Like') {
                            console.log($this.closest('button'));
                            $this.closest('button').trigger('click');
                        }
                    });
                }


                if (swipeBtnEl.length) {
                    console.log(swipeBtnEl.closest('button'));
                    clearInterval(x);
                    // swipeBtnEl.trigger('click');
                } else {
                    interval += 100;
                    if (interval === 5000) {
                        // location.reload();
                    }
                }
            }, interval);
        })();


        $('.clear-tempusdominus').on('click', function () {
            $(this)
                .siblings('input')
                .val('')
                .trigger('change');

        });


    </script>
@endpush
