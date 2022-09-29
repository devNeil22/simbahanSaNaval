$(document).ready(function(){

    var dateEmpty = false;
    var timeNot = false;
    $('.holy-mass').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var id = $('#id').val();
        var myName = $('#myName').val();
        var date = $('#date1').val();
        var message = $('#message').val();
        var time = $("input[name='gender']:checked").val();
        var email = $('#email').val();
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];

        var maindate = new Date(date)

        if($("input[name='gender']").prop('checked') == true){
            timeNot = false;
        }else{
            timeNot = true;
            $('#errorMessage').html('You Have not selected Time')
        }

        if(maindate == "Invalid Date"){
            dateEmpty = true;
            $('#date1').addClass('error')
        }else{
            dateEmpty = false;
            $('#date1').removeClass('error')
        }
    
        if(dateEmpty == false && timeNot == false){
            form_data1.append('id', id);
            form_data1.append('date', date);
            form_data1.append('message', message);
            form_data1.append('title', title);
            form_data1.append('myName', myName);
            form_data1.append('time', time);
            form_data1.append('email', email);
            form_data1.append('year', year);
            form_data1.append('month', actuallMonth);
            $('#sending').modal('show');

           $.ajax({
                url: '../includes/book-holy.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    $('#sending').modal('hide');
                    $('#success').modal('show');
                    setTimeout(function(){
                         $('#success').modal('hide');
                    }, 4000)
                    setTimeout(() => {
                         window.location.replace('./transactions.php')
                    }, 4000);
                }
            })
        }else{
            $('#errorMessage').html('Please Complete filling information')
            if(timeNot == true){
                $('#errorMessage').html('Please Select Time and date')
            }
        }
    })
})