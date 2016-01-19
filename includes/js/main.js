$(document).ready(function() {

    $("#owl-demo").owlCarousel({

        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        navigationText : false



        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });




    $( ".search" ).click(function() {
        $( ".search-form" ).fadeToggle( "slow", "linear" );
    });


    $('.item img').each(function () {
        var imgSrc = $(this).attr('src');
        $(this).parent().css('background-image', 'url(' + imgSrc + ')').end().remove();
    });





});