(function ($) {
    "use strict";
    //zoom image
    $(".zoom").ezPlus({
        lensFadeIn: 1000,
        lensFadeOut: 1000,
        easing: true,
        zoomWindowWidth: 300,
        zoomWindowHeight: 300,
        responsive: true,
        respond: [{
                range: '600-799',
                tintColour: '#F00',
                zoomWindowHeight: 100,
                zoomWindowWidth: 100
            },
            {
                range: '800-1199',
                tintColour: '#00F',
                zoomWindowHeight: 200,
                zoomWindowWidth: 200
            },
            {
                range: '100-599',
                enabled: false,
                showLens: false
            }
        ]
    });


    //nice number
    $(function () {

        $('.nice-act').niceNumber();

    });

    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    })


    $("#slider-active").owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            100: {
                items: 1,
            },
            480: {
                items: 1,
            },
            // breakpoint from 768 up
            997: {
                items: 1,
            }
        }
    });



    $("#feature-active").owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        margin:4,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            100: {
                items: 1,
            },
            480: {
                items: 3,
            },
            // breakpoint from 768 up
            997: {
                items: 5,
            }
        }
    });




    $(".owl-carousel.looking-active").owlCarousel({
        loop: true,
        nav: true,
        margin:20,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            100: {
                items: 1,
            },
            480: {
                items: 3,
            },
            // breakpoint from 768 up
            997: {
                items: 5,
            }
        }
    });
    //looking active

    // function carouselInit() {
    //     var owl = $('.owl-carousel.looking-active');
    //     owl.owlCarousel({
    //         responsive: {
    //             100: {
    //                 items: 1,
    //             },
    //             480: {
    //                 items: 3,
    //             },
    //             // breakpoint from 768 up
    //             997: {
    //                 items: 5,
    //             }
    //         },
    //         loop: true,
    //         autoplay: true,
    //         margin: 20,
    //         dots: false,
    //          nav: true,
    //         navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    //         // autoplay:true,
    //         autoplayTimeout: 2000,
    //         slideSpeed: 700,
    //         paginationSpeed: 400,
    //         autoplayHoverPause: true,
    //     });
    //     $('.play').on('click', function () {
    //         owl.trigger('play.owl.autoplay', [1000])
    //     })
    //     $('.stop').on('click', function () {
    //         owl.trigger('stop.owl.autoplay')
    //     })
    // }
    // carouselInit();



    // owlCarousel$('.feature-active').owlCarousel({
    //     loop: true,
    //     navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    //     nav: true,
    //     autoplay: true,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         767: {
    //             items: 1
    //         },
    //         1000: {
    //             items: 10
    //         }
    //     }
    // });
    
    
})(jQuery);