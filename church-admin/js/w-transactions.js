$(document).ready(function(){
     $.ajax({
        url: '../includes/wedding-transactions.php',
        type: 'post',
        success: function(res){
            $('.fetch-users').html(res)
        }
    }) 
})