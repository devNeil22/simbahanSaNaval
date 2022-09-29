$(document).ready(function(){
    $('#editTeacher').submit(function(e){
        e.preventDefault();
        let email = $('#email').val();
        //date
        var username = $('#username').val();
        var password = $('#password').val();
        
        $.ajax({
            url: '../includes/editAdmin.php',
            type :'post',
            data: {
                    email: email,
                    username: username,
                    password: password
            },
            success: function(res){
                alert(res)
                window.location.reload('profile.php')
            }
        })

    })

    $('.profile-pic').submit(function(e){
        e.preventDefault()
        var form_data = new FormData()
        var image = $('#pic')[0].files;
        form_data.append('my_pic', image[0])
        $.ajax({
            url: '../includes/adminProfilePic.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(res){
                alert(res)
                window.location.reload('adminProfile.php')
            }
        })
    })
})