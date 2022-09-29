$(document).ready(function(){
    $('#email').keyup(function(){
            var email = $(this).val();
            var form_data = new FormData();
            form_data.append('email', email)
            $.ajax({
                url: '../includes/email.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    $('.erremail').html(res)

                    if(res === '<span style="color: green;"><i class="fa-solid fa-check"></i> Email Available</span>'){
                        $("#r-submit").attr('disabled', false)
                        $("#r-submit").css('background-color', 'blue');
                    }
                }
            })
            
        })
})