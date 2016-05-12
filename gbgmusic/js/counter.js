var main = function() {
    $('.btn').click(function(){
     var post = $('.status-box').val();
     $('<li>').text(post).prependTo('.posts');
     $('.status-box').val('');
     $('.counter').text('250');
    });

        $('.status-box').keyup(function(){
            var postLength = $(this).val().length;
            var charactersLeft = 250-postLength;
            
            $('.counter').text(charactersLeft);

            if(charactersLeft < 0){
                $('.btn-primary').addClass('disabled');
            }
            else {  $('.btn-primary').removeClass('disabled');}
        });
};

$(document).ready(main);