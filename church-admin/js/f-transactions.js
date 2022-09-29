$(document).ready(function(){
    setTimeout(function(){
         $('#success').modal('hide');
    }, 2000)
     $.ajax({
        url: '../includes/funeral-transactions.php',
        type: 'post',
        success: function(res){
            $('.fetch-users').html(res)
        }
    }) 
})