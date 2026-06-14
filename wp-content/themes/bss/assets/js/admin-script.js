jQuery(document).ready(function ($) {

    $('.bss-upload-image').click(function (e) {
        e.preventDefault();

        let button = $(this);
        let imageField = button.prev('.bss-image-url');
        let previewImg = button.next('.bss-image-preview');

        let frame = wp.media({
            title: 'Select Banner Image',
            button: {
                text: 'Use Image'
            },
            multiple: false
        });

        frame.on('select', function () {
            let attachment = frame.state().get('selection').first().toJSON();

            imageField.val(attachment.url);
            previewImg.attr('src', attachment.url).show();
        });

        frame.open();
    });

});