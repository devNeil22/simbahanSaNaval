$(document).ready(function(){

    var emptyAmount = false;
    var emptygcash = false;
    var emptymessage = false;
    $('#donate').submit(function(e){
        e.preventDefault()
        var form_data1 = new FormData()
        var id = $('#id').val();
        var message = $('#message').val();
        var amount = $('#amount').val();
        var gcash = $('#gcash')[0].files;
        var email = $('#email').val();


        if(message == ""){
            emptymessage = true;
            $('#message').addClass('error')
        }else{
            emptymessage = false;
            $('#message').removeClass('error')
        }
        if(amount == ""){
            emptyAmount = true;
            $('#amount').addClass('error')
        }else{
            emptyAmount = false;
            $('#amount').removeClass('error')
        }

        if(gcash.length == 0){
            emptygcash = true;
            $('#gcash').addClass('error')
        }else{
            emptygcash = false;
            $('#gcash').removeClass('error')
        }
    
        if(emptyAmount == false && emptygcash == false && emptymessage == false){
            form_data1.append('id', id);
            form_data1.append('message', message);
            form_data1.append('amount', amount);
            form_data1.append('email', email);
            form_data1.append('gcash', gcash[0]);
               $('#sending').modal('show');

           $.ajax({
                url: '../includes/donate.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res)
                          $('#sending').modal('hide');
                    $('#success').modal('show');
                    setTimeout(function(){
                         $('#success').modal('hide');
                    }, 4000)
                    setTimeout(() => {
                         window.location.replace('./donation.php?id=' + id)
                    }, 4000);
                }
            })
        }else{
            $('#errorMessage').html('Please Complete filling information')
        }
    })
})