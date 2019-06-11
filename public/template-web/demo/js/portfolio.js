(function ($) {
    "use strict";
    //portfolio close button 
    $('.ic-close').on('click', function (event) {
        $('.worksajax').slideUp('slow', function () {
            $('.worksajax .content').remove();
        });
        return false;
    });

    $(".worksajax .slider").owlCarousel({
        navigation: true,
        navigationText: ['<span class="slide-nav inleft"><i class="fa fa-arrow-left"></i></span >', '<span class="slide-nav inright"><i class="fa fa-arrow-right"></i></span >'],
        slideSpeed: 800,
        autoPlay: true,
        pagination: true,
        paginationSpeed: 800,
        singleItem: true,
        transitionStyle: "fade"
    });

    // portfolio Video responsive
    $(".worksajax .video").fitVids();

    // script prettyphoto 
       $("a[data-rel^='prettyPhoto']").prettyPhoto({
        hook: 'data-rel',
        deeplinking: false
    });


    //easing portfolio scrolling
        $('.ic-close').on('click', function (event) {
            var $anchor = $('#editions');

            $('html, body').stop().animate({
                scrollTop: $($anchor).offset().top - 54
            }, 1000, 'linear');
            event.preventDefault();
        });


})(jQuery);