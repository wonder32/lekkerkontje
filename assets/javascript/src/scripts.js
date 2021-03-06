(function ($, root, undefined) {

    'use strict';

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var preview = $('.entry-content .l-container #image-preview .image-preview');
                preview.css({
                    'background-image': 'url("' +e.target.result + '")',
                    'background-repeat': 'no-repeat',
                    'background-size': 'cover',
                    'background-position': 'center bottom',
                    'padding-bottom': '100%'
                });
            }

            reader.readAsDataURL(input.files[0]);
        }

    }


    $(document).ready(function($) {

        //var Cookies = document.cookie;

        // mobile menu
        $('.js-menu-toggle').on('click', function(){
            $('body').toggleClass('is-menu-on');
        });

        // your File input id "#input_1_2"

        $(document).on("change","#input_1_12", function(){
            readURL(this);
        });

        /* cookie shit */
        if(!Cookies.get('cookie_notice_accepted')){
            var cookieHtml = '<div id="cookie-notice" role="banner" class="cn-top wp-default" style="color: rgb(255, 255, 255); background-color: rgb(0, 0, 0); display: block;"><div class="cookie-notice-container"><span id="cn-notice-text">Lekker-kontje.nl uses cookies and collects information about the website usage to analyse and improve. By using this website you approve your behaviour is tracked.</span><a href="#" id="cn-accept-cookie" data-cookie-set="accept" class="cn-set-cookie button wp-default">Confirm</a><a href="/cookies/" target="_blank" id="cn-more-info" class="cn-more-info button wp-default">Leave</a></div></div>';
            $(window).scroll(function(){
                var height = $(window).scrollTop();
                if(!Cookies.get('cookie_notice_accepted') && $('#cookie-notice').length === 0 && height > 10){
                    $('#cn-wrapper').html(cookieHtml);
                }
            });
        }

        $(document).on('click', '#cn-accept-cookie', (function(e){
            e.preventDefault();
            $('#cookie-notice').remove();
            Cookies.set('cookie_notice_accepted', '1', { expires: 365 });

        }));

        $(document).on('click', '#cn-more-info', (function(e){
            e.preventDefault();
            window.location.href = "https://www.google.com";

        }));

    });
})(jQuery, this);