jQuery(document).ready(function ($) {

    let activeButton = null;
    let activeInput = null;

    $(document).on('click', '.select-icon-btn', function () {
        console.log('Select icon button clicked');
        activeButton = $(this);
        activeInput = activeButton.next('input[type="hidden"]');

        $('#iconModal').fadeIn(200);

        const currentIcon = activeInput.val();

        $('input[name="icon"]').prop('checked', false);

        if (currentIcon) {
            $('input[name="icon"][value="' + currentIcon + '"]').prop('checked', true);
        }
    });

    $('.icon-modal-close').on('click', function () {
        $('#iconModal').fadeOut(200);
    });

    $('#iconModal').on('click', function (e) {
        if ($(e.target).is('#iconModal')) {
            $('#iconModal').fadeOut(200);
        }
    });

    $(document).on('change', 'input[name="icon"]', function () {

        $('input[name="icon"]').not(this).prop('checked', false);

        const iconClass = $(this).val();

        if (!activeButton || !activeInput) {
            return;
        }

        activeInput.val(iconClass);

        activeButton.html(
            '<i class="' + iconClass + '"></i>'
        );

        $('#iconModal').fadeOut(200);
    });

});