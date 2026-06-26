jQuery(function ($) {

    const $cards = $(".video-testimonials .card");
    let current = 0;

    function showCard(index) {
        $cards.hide().removeClass("active");
        $cards.eq(index).css("display", "flex").addClass("active");
    }

    showCard(current);

    $(".slider-next").on("click", function () {
        current = (current + 1) % $cards.length;
        showCard(current);
    });

    $(".slider-prev").on("click", function () {
        current = (current - 1 + $cards.length) % $cards.length;
        showCard(current);
    });

});