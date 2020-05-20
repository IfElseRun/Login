(function($){
    $('.form-signin').submit(function(e){
        e.preventDefault();
        $.post('ws/user.php?action=login', $('.form-signin').serialize(), function(data){
            var userData = JSON.parse(data);
            $('.span_username').text(userData.username);
            $('.span_userId').text(userData.userId);
            $('.user_modal').modal('show');
        }).fail(function() {
            alert( "User not found!" );
        });
    });
})(jQuery); closure 