$(document).ready(function(){
     $.ajax({
        url: '../includes/chr-transactions.php',
        type: 'post',
        success: function(res){
            $('.fetch-users').html(res)
        }
    }) 
})