$(document).ready(function(){

    // create function
    $("#createBox").click(function(){
        $("#inputBox").modal('show');
    });

    $("#createPost").click(function(){
        $("#inputPost").modal('show');
    });

    $("#createBox").click(function(){
        $("#inputBox").modal('show');
    });

    // edit function
    $("#editBox").click(function(){
        $("#inputEditBox").modal('show');
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
    });

    // ex-bookmark selection function
    $('.ex-bookmark').hover(function() {
        $(this).find('.overlay').fadeIn(500);
    }, function() {
        $(this).find('.overlay').fadeOut(500);
    });

});