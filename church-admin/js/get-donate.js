$(document).ready(function(){
     $.ajax({
        url: '../includes/d-members.php',
        type: 'post',
        success: function(res){
            $('.fetch-members').html(res)
        }
    }) 
})