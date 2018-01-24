function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        jQuery('#imgview').show();
        reader.onload = function (e) {
            jQuery('#imgview>img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


jQuery(document).ready(function($) {

    // mobile menu
    $('.js-menu-toggle').on('click', function(){
        $('body').toggleClass('is-menu-on');
    });

    // gravity image upload preview
    jQuery('#imgview').hide();


    // your File input id "#input_1_2"

    jQuery(document).on("change","#input_1_4", function(){
        readURL(this);
    });

});