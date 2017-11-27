/**
 * Theme Front end main js
 *
 */

(function($) {

    $(document).ready(function() {

        var $rtl = ( $("body").hasClass("rtl-body") ) ? true : false;

        //$(".bos-applicates-tab-container-a .tools-wrapper");

        $(".tools-wrapper").on("click" , function(){

            var postId = $(this).data("postId");

            var $currentContent = $("#bos-applicate-description-container-" + postId);

            var $container = $currentContent.parents(".bos-applicates-tab-container-a:first");

            $container.find(".bos-applicate-description-container").hide();

            $currentContent.show();

        });

        $(".brands-wrapper .brands-item .brands-plus,.knowledge-base-wrapper .brands-item .brands-plus").on("click" , function(){

            $(this).parents(".brands-plus-wrap:first").toggleClass("active");

        });

        $(".after-sale-services-menu-item > a.btn").each( function(){

            if( window.location.href.indexOf( $(this).attr("href") ) > -1 ){

                $(this).addClass("active");

            }

        });


        $(".knowledge-base-cats .knowledge-base-item").on( "click" , function(){

            var data = {
                'action'        : 'knowledge_base_posts',
                'term'          : $(this).data("termId")
            };

            var request = $.ajax({
                url         : window.__ajaxurl,
                method      : "POST",
                data        : data,
                dataType    : "html",
                beforeSend: function(){
                    $(".knowledge-base-loading").show();
                }
            });

            request.done(function( msg ) {
                $(".knowledge-base-wrapper.row").html( msg );
                $(".knowledge-base-loading").hide();
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
                $(".knowledge-base-loading").hide();
            });

        });


        $(".knowledge-base-cats .knowledge-base-item a.product-item-info").on("click" , function(e){

            e.preventDefault();

        });


        var $body = $("body");

        if( $body.hasClass("sed-app-editor") ){

            var api = sedApp.editor;

            if( typeof api.pageSettings != "undefined" ) {

                api.pageSettings.header_absolute = function (newValue, settingId) {

                    if (newValue && newValue == "yes") {

                        $body.addClass("has-header-absolute");

                    } else {

                        $body.removeClass("has-header-absolute");

                    }

                };

                api.pageSettings.logo_type = function (newValue, settingId) {

                    newValue = !newValue ? "dark" : newValue;

                    $body.removeClass("header-logo-dark");

                    $body.removeClass("header-logo-light");

                    $body.addClass('header-logo-' + newValue);

                };

            }

        }

        var __renderAnimate = function(){

            $(".wrapper--load__bar").css({
               "transform"  :  "translateY(-" + 200 + ") translateX(-50%);"
            });

            $body.addClass("is-ready");//$("#stars-menu-wrap-top").offset().top

            setTimeout(function() {

                $body.addClass("invisible");

                $body.removeClass("scroll-disable");

            }, 2000);

        };

        /**
         * Loading
         */
        var removePreloader = function() {
            setTimeout(function() {

                jQuery('.preloader').hide();

                __renderAnimate();

            }, 1500);
        };

        removePreloader();

    });


})(jQuery);
