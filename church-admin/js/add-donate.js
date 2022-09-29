$(document).ready(function(){
    $('#f-donate').submit(function(e){
        e.preventDefault();
        
        var id = $('#id').val();
        var email = $('#email').val();
        var amount = $('#amount').val();
        var date = new Date();
        var arrayMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var month = arrayMonth[date.getMonth()]
        var form_data = new FormData();
        form_data.append('id', id)
        form_data.append('email', email)
        form_data.append('amount', amount)
        form_data.append('month', month)

        if(amount == ""){
            $('.erramount').html('<i class="fa-solid fa-circle-exclamation"></i> Please Enter Amount!')
            $('#amount').addClass('error')
        }else{
             $('#d-done').html('<i class="fa-solid fa-spinner"></i> Proccessing')
             $('#d-done').attr('disabled', true)
               $('#amount').attr('readonly', true)
            $.ajax({
                url: '../includes/add-donate.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    alert(res)
                    window.location.reload('donations.php')
                }
            })
        }
    })
})