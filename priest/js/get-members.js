$(document).ready(function(){
     $.ajax({
        url: '../includes/fetch-members.php',
        type: 'post',
        success: function(res){
            $('.fetch-members').html(res)
        }
    }) 
})