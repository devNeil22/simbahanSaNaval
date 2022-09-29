$(document).ready(function(){
    var title = $('#title').val();
    
    $.ajax({
        url: '../includes/fetch-comment.php',
        type: 'post',
        data: {title: title},
        success: function(res){
            $('.ann').html(res);
        }
    }) 

    $('#announcement').submit(function(e){
        e.preventDefault()
        var form_data = new FormData()
        var announcement = $('#comment').val();
        var username = $('#username').val();
        var title = $('#title').val();

        if(announcement == ""){
            $('#comment').addClass('ann-error');
            $('.error-message').html('<i class="fa-solid fa-circle-exclamation"></i> this field is required')
        }else{
            form_data.append('announcement', announcement);
            form_data.append('username', username);
            form_data.append('title', title);

           $.ajax({
                url: '../includes/announcement.php',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    $('#comment').removeClass('ann-error');
                     $('.error-message').html('')
                    $('#comment').val("")
                    $('.ann').html(res);
                }
            }) 
        }   
    })
})