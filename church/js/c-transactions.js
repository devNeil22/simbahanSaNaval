$(document).ready(function(){
    var id = $('#id').val();
    var form_data = new FormData()
    form_data.append('id', id);
     $.ajax({
        url: '../includes/chr-transactions.php',
        type: 'post',
        data: form_data,
        contentType: false,
        processData: false,
        success: function(res){
            $('.fetch-users').html(res)
        }
    }) 
})