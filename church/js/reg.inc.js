$(document).ready(function(){
    $('#email').keyup(function(e){
            var email = $('#email').val();
            $.ajax({
                url: '../includes/reg.inc.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    "check_email":1,
                    "email": email
                },
                success: function(response){
                    var error = response.response;
                    $('.erremail').text(error);
                    if(error == 'email available'){
                        $('#email').addClass('nice');
                        $('.erremail').css('color', 'green')
                    }else{
                        $('#email').addClass('error');
                        $('.erremail').css('color', 'red')
                        $('#email').removeClass('nice');
                    }
                }

            })
        })

    $('#register').submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var address = $('#address').val();
        var last = $('#last').val();
        var first = $('#first').val();
        var confirm = $('#confirm').val();

        $.ajax({
            url: '../includes/register.inc.php',
            data: form_data,
            type: 'post',
            dataType: 'JSON',
            contentType: false,
            processData: false,
        })
        
    })
})