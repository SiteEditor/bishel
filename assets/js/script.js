/**
 * Theme Front end main js
 *
 */

(function($) {

    $(document).ready(function() {

        var $body = $("body");

        var $rtl = ( $body.hasClass("rtl-body") ) ? true : false;


        $(".col-exhibition-inner").on("click" , function () {

            var _PID = $( this ).data( "popupId" );

            $("#" + _PID).toggleClass("active");

        });

        $(".popop-close-container").on("click" , function () {

            $( this ).parents(".exhibition-popop:first").removeClass("active");

        });

        $(".exhibition-item-map .exhibition-popop").appendTo( $body );

        $("select.exhibition-filter").on("change" , function () {

            var _val = $(this).val();

            if( _val ){
                location.href = _val;
            }

        });



        /**
         * upsells
         */        

        var $rtl = ( $("body").hasClass("rtl-body") ) ? true : false;

        $(".upsells.products .products , .related.products .products").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 3,
                slidesToScroll      : 3,
                dots                : true,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite            : false, 
                prevArrow : '<span class="slide-nav-bt slide-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"><i class="fa fa-angle-right"></i></span>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,  
                        }
                    },
                    {
                        breakpoint: 860,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

        });


        /**
         * Google Map
         */

        /*
         *  new_map
         *
         *  This function will render a Google Map onto the selected jQuery element
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$el (jQuery element)
         *  @return	n/a
         */

        function new_map( $el ) {

            // var
            var $markers = $el.find('.marker');


            // vars
            var args = {
                zoom		: 13,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP
            };


            // create map
            var map = new google.maps.Map( $el[0], args);


            // add a markers reference
            map.markers = [];


            // add markers
            $markers.each(function(){

                add_marker( $(this), map );

            });


            // center map
            center_map( map );


            // return
            return map;

        }

        /*
         *  add_marker
         *
         *  This function will add a marker to the selected Google Map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$marker (jQuery element)
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function add_marker( $marker, map ) {

            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            // create marker
            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map
            });

            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow
            if( $marker.html() )
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open( map, marker );

                });
            }

        }

        /*
         *  center_map
         *
         *  This function will center the map, showing all markers attached to this map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ){

                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                bounds.extend( latlng );

            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 13 );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
            }

        }

        /*
         *  document ready
         *
         *  This function will render each map when the document is ready (page has loaded)
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	5.0.0
         *
         *  @param	n/a
         *  @return	n/a
         */
        // global var
        var map = null;

        $(document).ready(function(){

            $('.acf-map').each(function(){

                // create map
                map = new_map( $(this) );

            });

        });


        /**
         * Recent products
         */
        $('.recent-product-slider-wrapper').slick({
            dots                : false,
            slidesToShow        : 2,
            slidesToScroll      : 1,
            arrows              : true,
            //centerMode          : false,
            rtl                 : $rtl,
            //swipe               : true ,
            touchMove           : true ,
            infinite            : false,
            autoplay            : true,
            autoplaySpeed       : 4500 ,
            easing              : "easeOutQuad",
            speed               : 700 ,
            prevArrow           : '<span class="slide-nav-bt slide-prev"><i class="fa fa-angle-left"></i></span>',
            nextArrow           : '<span class="slide-nav-bt slide-next"><i class="fa fa-angle-right"></i></span>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow    : 2,
                        slidesToScroll  : 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow    : 1,
                        slidesToScroll  : 1
                    }
                }

                //You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        /**
         * Resize
         */

        setTimeout(function(){$(window).trigger(window.tg_debounce_resize);}, 2000);


        /**
         * Loading
         */
        var removePreloader = function() {
            setTimeout(function() {

                jQuery('.preloader').hide();

            }, 1500);
        };

        removePreloader();

    });


})(jQuery);
