var main = function() {
 $('#addeventbutt').attr('disabled',true);
    $('#bdname').keyup(function(){
        if($(this).val().length !=0)
            $('#addeventbutt').attr('disabled', false);            
        else
            $('#addeventbutt').attr('disabled',true);
    })

    

};

$(document).ready(main);