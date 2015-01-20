$(function(){
    $( "#tabs" ).tabs();
    $( ".university-tabs" ).tabs();

    $.each($('.input select'), function () {
        var width = $(this).width() + 15;
        if (width > 340){
            width = 340;
        }
        $(this).selectmenu({ "width" : width}) // You just take the width of the current select and add some extra value to it
    });

    $('.archive-menu .active').click(function(event){
        if (!$('.archive-menu').hasClass('opened')){
            $('.archive-menu ul').show();
            $('.archive-menu').addClass('opened');
        }
        else{
            $('.archive-menu ul').hide();
            $('.archive-menu').removeClass('opened');
        }
        event.preventDefault();
    });

    $('.archive-menu.opened .archive-item').click(function(event){
        $('.archive-menu ul').hide();
        $('.archive-menu').removeClass('opened');
    });

    $(document).click(function(event) {
        if ($(event.target).closest(".archive-menu").length) return;
        $('.archive-menu ul').hide();
        $('.archive-menu').removeClass('opened');
        event.stopPropagation();
    });
});