var main = function() {
    $('.btn').click(function(){
     var post = $('.status-box').val();
     //$('<li>').text(post).prependTo('.posts');
     //$('.status-box').val('');
     $('.counter').text('140');
    });

        $('.status-box').keyup(function(){
            var postLength = $(this).val().length;
            var charactersLeft = 140-postLength;
            
            $('.counter').text(charactersLeft);

            if(charactersLeft < 0){
                $('#addeventbutt').addClass('disabled');
            }
            else {  $('#addeventbutt').removeClass('disabled');
            }
        });
};

$(document).ready(main);