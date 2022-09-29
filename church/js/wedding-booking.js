$(document).ready(function(){

    var dateEmpty = false;
    var emptyGroom = false;
    var emptyBride = false;
    var emptyCenomar = false;
    var emptybb_certificate = false;
    var emptybg_certificate = false;
    var minDate = new Date();

    $("#d-bday").datepicker({
        'format': 'yyyy-mm-dd',
        showAnim: 'drop',
        //minDate: minDate
    })

    $("#d-death").datepicker({
         'format': 'yyyy-mm-dd',
        showAnim: 'drop',
        //minDate: minDate
    })

    $("#date").datepicker({
         'format': 'yyyy-mm-dd',
        showAnim: 'drop',
        minDate: minDate
    })


    $('.wedding-book').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var id = $('#id').val();
        var myName = $('#myName').val();
        var date = $('#date').val();
        var message = $('#message').val();
        //var title = $('#title').val();
        var nameGroom = $('#nameGroom').val();
        var nameBride = $('#nameBride').val();
        var bb_certificate = $('#bb-certificate')[0].files;
        var bg_certificate = $('#bg-certificate')[0].files;
        var cenomar = $('#cenomar')[0].files;
        var email = $('#email').val();
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var priest_id = $('#priest_id').val();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];

        var maindate = new Date(date)

        if(cenomar.length == 0){
            emptyCenomar = true;
            $('#cenomar').addClass('error')
        }else{
            emptyCenomar = false;
            $('#cenomar').removeClass('error')
        }

        if(maindate == "Invalid Date"){
            dateEmpty = true;
            $('#d-bday').addClass('error')
        }else{
            dateEmpty = false;
            $('#d-bday').removeClass('error')
        }

        if(bb_certificate.length == 0){
            emptybb_certificate = true;
            $('#bb-certificate').addClass('error')
        }else{
             emptybb_certificate = false;
            $('#bb-certificate').removeClass('error')
        }
        if(bg_certificate.length == 0){
            emptybg_certificate = true;
            $('#bg-certificate').addClass('error')
        }else{
             emptybg_certificate = false;
            $('#bg-certificate').removeClass('error')
        }

        if(nameBride == ""){
            emptyBride = true;
            $('#nameBride').addClass('error')
        }else{
            emptyBride = false;
            $('#nameBride').removeClass('error')
        }

        if(nameGroom == ""){
            emptyGroom = true;
            $('#nameGroom').addClass('error')
        }else{
            emptyGroom = false;
            $('#nameGroom').removeClass('error')
        }

    
        if(dateEmpty == false && emptyCenomar == false && emptyBride == false && emptyGroom == false && emptybb_certificate == false && emptybg_certificate == false){
            form_data1.append('id', id);
            form_data1.append('date', date);
            form_data1.append('message', message);
            //form_data1.append('title', title);
            form_data1.append('nameGroom', nameGroom);
            form_data1.append('nameBride', nameBride);
            form_data1.append('cenomar', cenomar[0]);
            form_data1.append('bg_certificate', bg_certificate[0]);
            form_data1.append('bb_certificate', bb_certificate[0]);
            form_data1.append('myName', myName);
            form_data1.append('email', email);
            form_data1.append('year', year);
            form_data1.append('priest_id', priest_id);
            form_data1.append('month', actuallMonth);
            
              $('#sending').modal('show');

           $.ajax({
                url: '../includes/book-wedding.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    $('#sending').modal('hide');
                    $('#success').modal('show');
                    setTimeout(function(){
                         $('#success').modal('hide');
                    }, 4000)
                    setTimeout(() => {
                         window.location.replace('./response.php?id=' + id)
                    }, 4000);
                }
            })
        }else{
            $('#errorMessage').html('Please Complete filling information')
        }
    })
})