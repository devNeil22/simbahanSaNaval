$(document).ready(function(){
     $.ajax({
        url: '../includes/fetch-priest.php',
        type: 'post',
        success: function(res){
            $('.fetch-members').html(res)
        }
    }) 
})