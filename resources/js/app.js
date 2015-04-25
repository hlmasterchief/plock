$(document).ready(function(){
    $("#createPost").click(function(){
        $("#inputPost").modal('show');
    });

    $("#createBox").click(function(){
        $("#inputBox").modal('show');
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
    });

});