$(document).ready(function () {
    $('.needs-validations').each(function (i, form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {

                event.preventDefault()
                event.stopPropagation()
            }
            // $(form).find('.indicator-label').hide();
            // $(form).find('.indicator-progress').fadeIn();
            // setTimeout(() => {
            //     $(form).find('.app-button').attr('disabled', true);
            // }, 100);
            form.classList.add('was-validated')
        }, false)
    });


    window.axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };


    $('span[data-kt-image-input-action="remove"]').on('click', function () {
        console.log('fdsfg')
        console.log($(this).closest('.image-input').find('#hidden-path'))
        $(this).closest('.image-input').find('#hidden-path').val(null);
    });

});
