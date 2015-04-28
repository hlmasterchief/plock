String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

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
        $("#inputPost-1").modal('show');
    });

    $("#createBox").click(function(){
        $("#inputBox").modal('show');
    });

    $("#createFavourite").click(function(){
        $("#inputFavourite").modal('show');
    });

    // edit function
    $("#editBox").click(function(){
        $("#inputEditBox").modal('show');
    });

    $("#editBookmark").click(function(){
        $("#inputEditBookmark").modal('show');
    });

    $(".addPost").click(function(){
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

    $(".favoutire_choose_create").click(function(){
        var id = $(this).attr("value");
        $("#favourite_create_type").attr("value", id);
        var title = $(this).html();
        $("#favoutire_choose_selected").html(title);
    });

    $('#comment_form').each(function() {
        $(this).find('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                this.form.submit();
            }
        });

        $(this).find('input[type=submit]').hide();
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
        $(this).find('.dropdown-menu').first().css('top', '0px');
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeToggle(500);
    });

    // Add fadeToggle animation to dropdown
    $('.dropdown').on('hidden.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().css('top', '99999px');
    });

    // ex-bookmark selection function
    $('#found-list').on('mouseenter', '.ex-bookmark', function(e) {
        $(this).find('.overlay').fadeIn(500);
    });

    $('#found-list').on('mouseleave', '.ex-bookmark', function(e) {
        $(this).find('.overlay').fadeOut(500);
    });

    // create bookmark category choose
    $('#inputPost-1 .createPost-form .dropdown .dropdown-menu li').click(function() {
        $('#inputPost-1 .createPost-form .dropdown #current-category').text($(this).text());
        $('#inputPost-1 #type').val($(this).attr('value'));
        $('#inputPost-3 #type').val($(this).attr('value'));

        $('#inputPost-2 #search-type').text($(this).attr('value'));
    });

    $("#createPost-form-1").submit(function(event) {
        event.preventDefault();

        if ($('#inputPost-1 #type').val() === "") {
            $('#inputPost-1 #warning-category').text('Please choose a category.');
            return false;
        }

        $('#inputPost-1 #warning-category').text('');

        $('#inputPost-2 #search-words').text($("#createPost-form-1 #name").val().capitalizeFirstLetter());

        BookmarkSearch.fetch({
            name: $("#createPost-form-1 #name").val(),
            type: $("#createPost-form-1 #type").val()
        }, function() {
            $('#inputPost-1').modal('hide');

            $('#inputPost-1').on('hidden.bs.modal', function(e) {
                if (BookmarkFounds.length === 0) {
                    $('#inputPost-3').modal('show');
                } else {
                    $('#inputPost-2').modal('show');
                }
            });
        });
    });

});