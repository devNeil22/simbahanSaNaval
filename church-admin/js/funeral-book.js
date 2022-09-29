$(document).ready(function(){

    var dateEmpty = false;
    var nameEmpty = false;
    var relationshipEmpty = false;
    var d_bdayEmpty = false;
    var d_deathEmpty = false;
    var certificateEmpty = false;
    var b_certificateEmpty = false;
    var timeNot = false;

    $('.funeral-book').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var id = $('#id').val();
        var myName = $('#myName').val();
        var date = $('#date').val();
        var message = $('#message').val();
        var title = $('#title').val();
        var name = $('#Name').val();
        var relationship = $('#relationship').val();
        var d_bday = $('#d-bday').val();
        var d_death = $('#d-death').val();
        var certificate = $('#certificate')[0].files;
        var b_certificate = $('#b-certificate')[0].files;
        var time = $("input[name='gender']:checked").val();
        var email = $('#email').val();
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];

        var maindate = new Date(date)
        var deathDate = new Date(d_bday)
        var birthDate = new Date(d_bday)
        console.log(time)

        if($("input[name='gender']").prop('checked') == true){
            timeNot = false;
        }else{
            timeNot = true;
            $('#errorMessage').html('You Have not selected Time')
        }


        if(certificate.length == 0){
            certificateEmpty = true;
            $('#certificate').addClass('error')
        }else{
            certificateEmpty = false;
            $('#certificate').removeClass('error')
        }

        if(maindate == "Invalid Date"){
            dateEmpty = true;
            $('#date').addClass('error')
        }else{
            dateEmpty = false;
            $('#date').removeClass('error')
        }

        if(deathDate == "Invalid Date"){
            d_deathEmpty = true;
            $('#d-death').addClass('error')
        }else{
            d_deathEmpty = false;
            $('#d-death').removeClass('error')
        }

        if(birthDate == "Invalid Date"){
            d_bdayEmpty = true;
            $('#d-bday').addClass('error')
        }else{
            d_bdayEmpty = false;
             $('#d-bday').removeClass('error')
        }

        if(b_certificate.length == 0){
            b_certificateEmpty = true;
            $('#b-certificate').addClass('error')
        }else{
             b_certificateEmpty = false;
            $('#b-certificate').removeClass('error')
        }

        if(name == ""){
            nameEmpty = true;
            $('#Name').addClass('error')
        }else{
            nameEmpty = false;
            $('#Name').removeClass('error')
        }

        if(relationship == ""){
            relationshipEmpty = true;
            $('#relationship').addClass('error')
        }else{
            relationshipEmpty = false;
            $('#relationship').removeClass('error')
        }
    
        if(dateEmpty == false && nameEmpty == false && relationshipEmpty == false && d_bdayEmpty == false && d_deathEmpty == false && certificateEmpty == false && b_certificateEmpty == false && timeNot == false){
            form_data1.append('id', id);
            form_data1.append('date', date);
            form_data1.append('message', message);
            form_data1.append('title', title);
            form_data1.append('name', name);
            form_data1.append('relationship', relationship);
            form_data1.append('d_bday', d_bday);
            form_data1.append('d_death', d_death);
            form_data1.append('certificate', certificate[0]);
            form_data1.append('b_certificate', b_certificate[0]);
            form_data1.append('myName', myName);
            form_data1.append('time', time);
            form_data1.append('email', email);
            form_data1.append('year', year);
            form_data1.append('month', actuallMonth);
              $('#sending').modal('show');

           $.ajax({
                url: '../includes/book-funeral.php',
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
                $('#errorMessage').html('Please Select Time')
            }
        }
    })
})