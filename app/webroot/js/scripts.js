$( "#tabs" ).tabs();
$( ".university-tabs" ).tabs();

$.each($('.input select'), function () {
    var width = $(this).width() + 15;
    if (width > 340){
        width = 340;
    }
    $(this).selectmenu({ "width" : width}) // You just take the width of the current select and add some extra value to it
})
