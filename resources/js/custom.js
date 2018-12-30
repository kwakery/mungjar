$(document).ready(function() {
    var $portfolio = $('.gallery_items');

    $portfolio.imagesLoaded(function () {
        // Isotope + Masonry
        $portfolio.isotope({
            itemSelector: '.grid-item',
            layoutMode: 'masonry',
            filter: '*'
        });
    });

    $('.filter-menu li').on('click', function() {
        $('.filter-menu li').removeClass('disabled');
        $(this).addClass('disabled');
        var selector = $(this).attr('data-filter');
        $portfolio.isotope({
            filter: selector,
        });
    });

    /* Bootstrap stuff */

    $('[data-toggle="tooltip"]').tooltip()


});
