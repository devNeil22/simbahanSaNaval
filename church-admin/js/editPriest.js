$(document).ready(function(){
    $('#editTeacher').submit(function(e){
        e.preventDefault();
        var first = $('#first').val();
        let last = $('#last').val();
        let email = $('#email').val();
        let position = $('#position').val();
        let address = $('#address').val();
        //date
        var id = $('#id').val();
        var password = $('#password').val();
        
        $.ajax({
            url: '../includes/editPriest.php',
            type :'post',
            data: {last: last,
                    first: first,
                    email: email,
                    position: position,
                    address: address,
                    id:id,
                    password: password
            },
            success: function(res){
                alert(res)
                window.location.reload('priestProfile.php')
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
            url: '../includes/updateImagePriest.php',
            type: 'post',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(res){
                alert(res)
                window.location.reload('priestProfile.php')
            }
        })
    })
})