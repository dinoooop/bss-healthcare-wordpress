jQuery(function ($) {

    $('.team-member').on('click', function () {

        let teamId = $(this).data('team-id');

        $('#team-modal-loading').show();
        $('#team-modal-content').html('');

        let modal = new bootstrap.Modal(
            document.getElementById('teamModal')
        );

        modal.show();

        $.ajax({
            url: bssTeam.ajax_url,
            type: 'POST',
            data: {
                action: 'bss_get_team_member',
                team_id: teamId
            },
            success: function (response) {

                $('#team-modal-loading').hide();

                if (response.success) {
                    $('#team-modal-content')
                        .html(response.data);
                }
            }
        });

    });

});