$(document).ready(function(){
    var day = $('#delete-day').val();
    var id  = $('#t-id');
    var title = $('#t-title');
    $.ajax({
        url: '../includes/fetch-editTime.php',
        type: 'post',
        data: {title: title, day: day, id: id},
        success: function(res1){
            $('.t-time').html(res1);
        }
    })

    $('#delete-day').on('change', function(){
        var day = $('#delete-day option:selected').val();
        $.ajax({
        url: '../includes/fetch-editTime.php',
        type: 'post',
        data: {title: title, day: day, id: id},
        success: function(res1){
            $('.t-time').html(res1);
        }
    })
    })
})