function readURL(e) {
    if (e.files && e.files[0]) {
        var i = new FileReader;
        jQuery("#imgview").show(), i.onload = function (e) {
            jQuery("#imgview>img").attr("src", e.target.result)
        }, i.readAsDataURL(e.files[0])
    }
}

jQuery(document).ready(function (e) {
    e(".js-menu-toggle").on("click", function () {
        e("body").toggleClass("is-menu-on")
    }), jQuery("#imgview").hide(), jQuery(document).on("change", "#input_1_4", function () {
        readURL(this)
    })
});