$(document).ready(function() {
    $("#login-head").submit(function(event) {
        event.preventDefault();
        let username = $("#head-user").val();
        let password = $("#head-pwd").val();
        let submit_headt = $("#submit-headt").val();

        $(".login-success").load("./includes/login.inc.php", {
            username: username,
            password: password,
            submit_headt: submit_headt
        });  
    });

    $("#register").submit(function(event){
        event.preventDefault();
        let last = $("#last").val();
        let first = $("#first").val();
        let username = $("#username").val();      
        let email = $("#email").val();
        let address = $("#address").val();
        let password = $("#password").val();
        let confirm_password = $("#c-password").val();
        let r_submit = $("#r-submit").val();

        $(".register-status").load("../includes/register.inc.php",{
            last: last,
            first: first,
            username: username,
            email: email,
            password: password,
            confirm_password: confirm_password,
            address: address,
            r_submit: r_submit
        })
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

    $("#confirm").submit(function(e){
        e.preventDefault();
        
        var code = $('#code').val();
        var id = $('#id').val();
        var r_submit = $("#r-submit").val();

        $('.register-status').load("../includes/confirm.inc.php", {
            code: code,
            id, id,
            r_submit: r_submit
        })
    })

    $('.report').click(function(){
        $('.items').toggleClass('active');
    })

     $('.registered').click(function(){
        $.ajax({
            url: 'registered.php',
            type: 'post',
            success: function(result){
                $('#activities1').html(result)
            }
        })
    })

     $('.funeral').click(function(){
        $.ajax({
            url: 'funeral.php',
            type: 'post',
            success: function(result){
                $('#activities1').html(result)
            }
        })
    })

     $('.wedding').click(function(){
        $.ajax({
            url: 'wedding.php',
            type: 'post',
            success: function(result){
                $('#activities1').html(result)
            }
        })
    })

     $('.holy').click(function(){
        $.ajax({
            url: 'holy-mass.php',
            type: 'post',
            success: function(result){
                $('#activities1').html(result)
            }
        })
    })

     $('.chrs').click(function(){
        $.ajax({
            url: 'chris.php',
            type: 'post',
            success: function(result){
                $('#activities1').html(result)
            }
        })
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

    $('#burger').click(function(){
        $('.sidebar').toggleClass('active')
    })
    
});