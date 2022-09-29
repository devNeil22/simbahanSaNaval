$(document).ready(function(){

    var title = $('#title').val();

    $('#add-time').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var time = $('#time').val();
        var zone = $('#zone option:selected').val();
        var day = $('#day option:selected').val();
        var title = $('#title').val();
        var id = $('#id').val();
        

        if(time == ""){
            $('.error-message1').html('<i class="fa-solid fa-circle-exclamation"></i> this field is required')
        }else{
            form_data1.append('time', time);
            form_data1.append('zone', zone);
            form_data1.append('title', title);
            form_data1.append('day', day);
            form_data1.append('id', id);

           $.ajax({
                url: '../includes/add-time.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    $('.error-message').html('')
                    $('#time').val("")
                    $('.time').html(res)
                    alert('Time Added')
                    alert(res)
                }
            }) 
        }   
    })
})