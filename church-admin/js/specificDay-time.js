$(document).ready(function(){
    $("#date1").datepicker({
        'format': 'yyyy-mm-dd'
    })
    
    $("#date1").on('change', function(){
        var myDate = $(this).val()
        var date = new Date(myDate),
            day = date.getDay()
        
        var arrayDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
        var myDay = arrayDay[day];
        var title = $('#title').val();

        var form_data = new FormData()
        form_data.append('day', myDay)
        form_data.append('title', title)

        $.ajax({
                url: '../includes/fetch-time.php',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    $('.time').html(res)
                }
            }) 
        
    })
    
    
})