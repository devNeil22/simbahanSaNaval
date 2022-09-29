$(document).ready(function(){
    $('#editTeacher').submit(function(e){
        e.preventDefault();
        var first = $('#first').val();
        let last = $('#last').val();
        let email = $('#email').val();
        let mobile = $('#mobile').val();
        let address = $('#address').val();
        let gender = $('#gender option:selected').val();
        let status = $('#status option:selected').val();
        //date
        var id = $('#id').val();
        var username = $('#username').val();
        var password = $('#password').val();
        
        $.ajax({
            url: '../includes/editprofile2.inc.php',
            type :'post',
            data: {last: last,
                    first: first,
                    email: email,
                    mobile: mobile,
                    address: address,
                    gender: gender,
                    status: status,
                    id:id,
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
        var id = $('#id').val();
        var image = $('#pic')[0].files;
        form_data.append('my_pic', image[0])
        form_data.append('id', id)

        $.ajax({
            url: '../includes/updateImage2.php',
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