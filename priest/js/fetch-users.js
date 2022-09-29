$(document).ready(function(){
    var title = $('#title').val()
    var form_data = new FormData()
    form_data.append('title', title)

     $.ajax({
        url: '../includes/fetch-users.php',
        type: 'post',
        data: form_data,
        contentType: false,
        processData: false,
        success: function(res){
            $('.display-users').html(res)
        }
    }) 
})