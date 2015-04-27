$(document).ready(function(){

    //search input
    $("#search-icon").on('click', function(){
        $(this).addClass("active");
        $("#search").focus();
    });

    $("#search").focusout(function(){
        $("#search-icon").removeClass("active");
    });

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

    $("#editBookmark").click(function(){
        $("#inputEditBookmark").modal('show');
    });

    $("#addPost").click(function(){
        var id = $(this).attr("value");
        $("#bookmark_id").attr("value", id);
        $("#inputAddPost").modal('show');
    });

    $(".box_choose_save").click(function(){
        var id = $(this).attr("value");
        $("#box_new_id").attr("value", id);
        var title = $(this).html();
        $("#box_choose_selected").html(title);
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