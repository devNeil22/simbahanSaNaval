$(document).ready(function(){

    var title = $('#t-title').val();
    
    $('#delete-day').on('change', function(){
        var day = $('#delete-day option:selected').val();
        $.ajax({
        url: '../includes/fetch-editTime.php',
        type: 'post',
        data: {title: title, day: day},
        success: function(res1){
            $('.t-time').html(res1);
        }
        })
    })
})