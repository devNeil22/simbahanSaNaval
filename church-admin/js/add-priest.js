$(document).ready(function(){
    $('#add-member').submit(function(e){
        e.preventDefault();

        var emptyLast = false;
        var emptyFirst = false;
        var emptyusername = false;
        var emptyEmail = false;
        var emptyPosition = false;
        var emptyProfile = false;

        var last = $('#last').val();
        var first = $('#first').val();
        var position = $('#position').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var profile_pic = $('#profile')[0].files;
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];

        if(last == ""){
            emptyLast = true;
            $('#last').addClass('error')
        }else{
            emptyLast = false;
            $('#last').removeClass('error')
        }

        if(first == ""){
            emptyLast = true;
            $('#first').addClass('error')
        }else{
            emptyLast = false;
            $('#first').removeClass('error')
        }

        if(position == ""){
            emptyPosition = true;
            $('#position').addClass('error')
        }else{
            emptyPosition = false;
            $('#position').removeClass('error')
        }

        if(username == ""){
            emptyusername = true;
            $('#username').addClass('error')
        }else{
            emptyusername = false;
            $('#username').removeClass('error')
        }

        if(email == ""){
            emptyEmail = true;
            $('#email').addClass('error')
        }else{
            emptyEmail = false;
            $('#email').removeClass('error')
        }

        if(profile_pic.length == 0){
            emptyProfile = true;
            $('#profile').addClass('error')
        }else{
            emptyProfile = false;
            $('#profile').removeClass('error')
        }

        var form_data = new FormData();

        if(emptyPosition == false && emptyEmail == false && emptyFirst == false && emptyLast == false && emptyLast == false && emptyusername ==  false && emptyProfile == false){
            form_data.append('last', last);
            form_data.append('first', first);
            form_data.append('position', position);
            form_data.append('email', email);
            form_data.append('username', username);
            form_data.append('profile', profile_pic[0]);
            form_data.append('year', year);
            form_data.append('month', actuallMonth);

            $('#sending').modal('show');
             $.ajax({
                url: '../includes/reg-priest.php',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    // alert(res)
                    $('#sending').modal('hide');
                    $('#success').modal('show');
                    setTimeout(function(){
                         $('#success').modal('hide');
                    }, 4000)
                    setTimeout(() => {
                         window.location.replace('./priests.php')
                    }, 4000);
                    //alert(res);
                }
            })
        }else{
            $('.error-message').html('Please complete inputing data!')
        }
        
    })
})