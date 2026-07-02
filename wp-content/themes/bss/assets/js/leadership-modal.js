jQuery(function ($) {

    $('.leadership-member').on('click', function () {

        let leadershipId = $(this).data('leadership-id');

        $('#leadership-modal-loading').show();
        $('#leadership-modal-content').html('');

        let modal = new bootstrap.Modal(
            document.getElementById('leadershipModal')
        );

        modal.show();

        $.ajax({
            url: bssLeadership.ajax_url,
            type: 'POST',
            data: {
                action: 'bss_get_leadership_member',
                leadership_id: leadershipId
            },
            success: function (response) {

                $('#leadership-modal-loading').hide();

                if (response.success) {
                    $('#leadership-modal-content')
                        .html(response.data);
                }
            }
        });

    });

});
