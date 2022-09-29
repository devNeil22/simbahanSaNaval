$(document).ready(function() {
    $("#r-submit").attr('disabled', true)
    $("#login-head").submit(function(event) {
        event.preventDefault();
        let username = $("#head-user").val();
        let password = $("#head-pwd").val();
        let submit_headt = $("#submit-headt").val();

        $(".login-success").load("../includes/login.inc.php", {
            username: username,
            password: password,
            submit_headt: submit_headt
        });  
    });

    $("#register").submit(function(event){
        event.preventDefault();
        var emptyLast = false;
        var emptyfirst = false;
        var emptyUser = false;
        var emptyemail = false;
        var emptyaddress = false;
        var emptypassword = false;
        var emptyconfirm = false;

        let last = $("#last").val();
        let first = $("#first").val();
        let username = $("#username").val();      
        let email = $("#email").val();
        let address = $("#address").val();
        let password = $("#password").val();
        let confirm_password = $("#c-password").val();
        let r_submit = $("#r-submit").val();
        var thisDate = new Date()
        var year = thisDate.getFullYear();
        var month = thisDate.getMonth();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var actuallMonth = arrayMonth[month];
        var form_data = new FormData();
        if($('#last').val() == ""){
            emptyLast = true;
            $('#last').addClass('error');
            $('.errlast').html('Please enter your Last Name')
        }else{
            emptyLast = false;
            $('#last').removeClass('error');
            $('.errlast').html('')
        }

        if($('#first').val() == ""){
            emptyfirst = true;
            $('#first').addClass('error');
            $('.errfirst').html('Please enter your first Name')
        }else{
            emptyLast = false;
            $('#first').removeClass('error');
            $('.errfirst').html('')
        }

        if($('#username').val() == ""){
            emptyUser = true;
            $('#username').addClass('error');
            $('.errusername').html('Please enter your username')
        }else{
            emptyUser = false;
            $('#username').removeClass('error');
            $('.errusername').html('')
        }

        if($('#email').val() == ""){
            emptyemail = true;
            $('#email').addClass('error');
            $('.erremail').html('Please enter your valid email')
        }else{
            emptyLast = false;
            $('#email').removeClass('error');
            $('.erremail').html('')
        }

        if($('#address').val() == ""){
            emptyaddress = true;
            $('#address').addClass('error');
            $('.erradd').html('Please enter your address')
        }else{
            emptyLast = false;
            $('#address').removeClass('error');
            $('.erradd').html('')
        }

        if($('#password').val() == ""){
            emptypassword = true;
            $('#password').addClass('error');
            $('.errpass').html('Please enter your password')
        }else{
            emptyLast = false;
            $('#password').removeClass('error');
            $('.errpass').html('')
        }

        if($('#c-password').val() == ""){
            emptyconfirm = true;
            $('#c-password').addClass('error');
            $('.errconfirm').html('Please confirm your password')
        }else{
            emptyconfirm = false;
            $('#c-password').removeClass('error');
            $('.errconfirm').html('')
        }

        if(confirm_password != password){
            emptyconfirm = true;
            $('#c-password').addClass('error');
            $('.errconfirm').html('Password did not match')
        }else{
            emptyconfirm = false;
            $('#c-password').removeClass('error');
            $('.errconfirm').html('')
        }

        if(emptyLast == false && emptyUser == false && emptyaddress == false && emptyconfirm == false && emptyemail == false && emptyfirst == false && emptypassword == false){
            form_data.append('first', first)
            form_data.append('last', last)
            form_data.append('address', address)
            form_data.append('email', email)
            form_data.append('username', username)
            form_data.append('pass', password)
            form_data.append('r_submit', r_submit)
            var status = navigator.onLine;
            if(!status){
                //alert('please check your internet connection')
                $('#myModal').modal('show')
                $('.modal-body').html('<h4><i class="fa-solid fa-face-frown-open"></i> please check your internet connection</h4>')
            }else{
                //alert('sdaflkjsadhfj')
                //$('#myModal').modal('show')
                //$('.modal-body').html('<h2><i class="fa-solid fa-hand"></i> processing your information</h2>')
                $('.register-status').html('<span style="color:green"><i class="fa-solid fa-loader"></i>Processing Your Registration........</span>')
                $.ajax({
                    url: '../includes/register.inc.php',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        //$('#myModal').modal('hide')
                        $('.register-status').html('')
                        $('#success').modal('show')
                        setTimeout(() => {
                            $('#success').modal('hide')
                        }, 4000)
                        window.location.replace('../forms/confirmation.php')
                    } 
                })
            }
        }
    })

    $("#register-form").submit(function(e){
        e.preventDefault();
        
        let code = $("#code").val();
        let s_submit = $("#s-submit").val();
        let id = $("#id").val();
        let email = $("#email").val()
        
        $(".status").load("../includes/school.inc.php", {
            id: id,
            code: code,
            s_submit: s_submit,
            email: email
        })
    })

    $('#s-submit').attr('disabled', true)
    $('#code').keyup(function(){
        $('#s-submit').attr('disabled', false)
        $('#s-submit').css('background-color', 'blue')
    })
    $("#confirm").submit(function(e){
        e.preventDefault();
        
        var code = $('#code').val();
        var id = $('#id').val();
        var form_data = new FormData();
        form_data.append('code', code)
        form_data.append('id', id)

        if($('#code').val() == ""){
            $('.register-status').html('please input confirmation code')
        }else{
            $.ajax({
                url: '../includes/confirm.inc.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    if(res != ""){
                        $('.register-status').html(res)
                    }else{
                        window.location.replace('../forms/login.php')
                    }
                }
            })
        }
        
    })


    $('#click-appoint').click(function(){
        $('.appoint').toggleClass('cge');
        $('.down').html('<i class="fa-solid fa-angle-down"></i>')
        $('.prof1').removeClass('hala');
    })

    $('.cge').click(function(){
        $('.down').html('<i class="fa-solid fa-angle-right"></i>')
    })

    $('#prof').click(function(){
        $('.prof1').toggleClass('hala');
        $('.lahi').html('<i class="fa-solid fa-angle-down"></i>')
        $('.appoint').removeClass('cge');
    })

    $('#log-out').click(function(){
       if(confirm('Are you sure you want to log out?') == true){
                $.ajax({
                url: '../includes/log-out.php',
                type: 'post',
                success: function(){
                    setTimeout(function(){
                        $('.log-out').modal('show')
                    },2000)
                    window.location.replace('../index.php')
                }
            })
       }
       
    })
});