jQuery(document).ready(function($) {
    "use strict";
    //Side Bar Menu Js
    if ($('#cp_side-menu-btn, #cp-close-btn').length) {
        $('#cp_side-menu-btn, #cp-close-btn').on('click', function(e) {
            var $navigacia = $('body, #cp_side-menu'),
                val = $navigacia.css('left') === '410px' ? '0px' : '410px';
            $navigacia.animate({
                left: val
            }, 410)
        });
    }

    //SCROLL FOR SIDEBAR NAVIGATION
    if ($('#content-1').length) {
        $("#content-1").mCustomScrollbar({
            horizontalScroll: false
        });
        $(".content.inner").mCustomScrollbar({
            scrollButtons: {
                enable: true
            }
        });
    }

    //HEADER SEARCH
    if ($('#searchtoggl').length) {
        var $searchlink = $('#searchtoggl i');
        var $searchbar = $('.cp-search-outer');

        $('#searchtoggl').on('click', function(e) {
            e.preventDefault();

            if ($(this).attr('id') == 'searchtoggl') {
                if (!$searchbar.is(":visible")) {
                    // if invisible we switch the icon to appear collapsable
                    $searchlink.removeClass('fa-search').addClass('fa-search-minus');
                } else {
                    // if visible we switch the icon to appear as a toggle
                    $searchlink.removeClass('fa-search-minus').addClass('fa-search');
                }

                $searchbar.slideToggle(300, function() {
                    // callback after search bar animation
                });
            }
        });

        $('#searchform').submit(function(e) {
            e.preventDefault(); // stop form submission
        });
    }


    //Audio
    if ($('audio').length) {
        $('audio').audioPlayer();
    }


    //FOR CUSTYOM FORM RADIO BUTTON LI ACTIVE BACKGROUND
    $('.cp-price-box form ul li').on('click', function(e) {
        $('.cp-price-box ul').children().removeClass('active');
        $(this).addClass('active');
    });
	

    //SLIDER FOR SMILER IMAGES
    if ($('.tab-carousel').length) {
        $('.tab-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false
                }
            }
        })
    }

    //About Us page Testimonials
    if ($("#about-testimonials").length) {
        $('#about-testimonials').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 1
                }
            }
        })
    }

    //BLOG SLIDER
    if ($(".post-slider").length) {
        $('.post-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    }

    //CONTACT MAP
    if ($('#map_contact_2').length) {
        var map;
        var myLatLng = new google.maps.LatLng(48.85661, 2.35222);
        //Initialize MAP
        var myOptions = {
            zoom: 12,
            center: myLatLng,
            //disableDefaultUI: true,
            zoomControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            styles: [{
                saturation: -100,
                lightness: 10

            }],
        }
        map = new google.maps.Map(document.getElementById('map_contact_2'), myOptions);
        //End Initialize MAP
        //Set Marker
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            icon: 'images/map-icon.png'
        });
        marker.getPosition();
        //End marker

        //Set info window
        //var infowindow = new google.maps.InfoWindow({
        //  content: '',
        //position: myLatLng
        //});
        //infowindow.open(map);
    }

    //Function End
});


//Masonry Window Load First
$(window).load(function() {
    //MASONRY GALLERY
    if ($(".cp-gallery-masonry-1 .isotope").length) {
        var $container = $('.cp-gallery-masonry-1 .isotope');
        $container.isotope({
            itemSelector: '.item',
            transitionDuration: '0.6s',
            masonry: {
                columnWidth: $container.width() / 12
            },
            layoutMode: 'masonry'

        });

        $(window).resize(function() {

            $container.isotope({
                masonry: {

                    columnWidth: $container.width() / 12
                }
            });
        });

    }
});