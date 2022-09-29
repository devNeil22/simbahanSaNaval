$(document).ready(function(){
    $('#username').keyup(function(){
            var username = $(this).val();
            var form_data = new FormData();
            form_data.append('username', username)
            $.ajax({
                url: '../includes/username.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    $('.errusername').html(res)
                }
            })
            
        })
})