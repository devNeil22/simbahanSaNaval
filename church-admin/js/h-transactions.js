$(document).ready(function(){
     $.ajax({
        url: '../includes/holy-transactions.php',
        type: 'post',
        success: function(res){
            $('.fetch-users').html(res)
        }
    }) 
})