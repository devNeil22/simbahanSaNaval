$(document).ready(function(){

    var dateEmpty = false;
    var emptyName = false;
    var emptyCert = false;
    $('.chr-book').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var id = $('#id').val();
        var myName = $('#myName').val();
        var date = $('#date1').val();
        var message = $('#message').val();
        var name = $('#name').val();
        var cert = $('#b-cert')[0].files;
        var maindate = new Date(date);
        var email = $('#email').val();
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];

        if(maindate == "Invalid Date"){
            dateEmpty = true;
            $('#date1').addClass('error')
        }else{
            dateEmpty = false;
            $('#date1').removeClass('error')
        }

        if(name == ""){
            emptyName = true;
            $('#name').addClass('error')
        }else{
            emptyName = false;
            $('#name').removeClass('error')
        }

        if(cert.length == 0){
            emptyCert = true;
            $('#b-cert').addClass('error')
        }else{
            dateEmpty = false;
            $('#b-cert').removeClass('error')
        }
    
        if(dateEmpty == false && emptyCert == false && emptyName == false){
            form_data1.append('id', id);
            form_data1.append('date', date);
            form_data1.append('message', message);
            form_data1.append('title', title);
            form_data1.append('myName', myName);
            form_data1.append('name', name);
            form_data1.append('email', email);
            form_data1.append('cert', cert[0]);
            form_data1.append('year', year);
            form_data1.append('month', actuallMonth);
               $('#sending').modal('show');

           $.ajax({
                url: '../includes/book-chr.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    //alert(res)
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
        }
    })
})