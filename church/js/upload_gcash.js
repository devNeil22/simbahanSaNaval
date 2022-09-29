$(document).ready(function(){

    var emptyGcash = false;
    var emptyAmount = false;

    $('.gcash').submit(function(e){
        e.preventDefault();
        
        var form_data1 = new FormData()
        var gcash = $('#gcash')[0].files;
        var id = $('#id').val();
        var u_id = $('#u_id').val();
        var amount = $('#amount').val();
        var title = $('#title').val();

        if(gcash.length == 0){
            emptyGcash = true;
            $('#gcash').addClass('error')
        }else{
            emptyGcash = false;
            $('#gcash').removeClass('error')
        }

        if(amount == ""){
            emptyAmount = true;
            $('#amount').addClass('error')
        }else{
            emptyAmount = false;
            $('#amount').removeClass('error')
        }

          if(emptyGcash ==  false){
            form_data1.append('id', id);
            form_data1.append('gcash', gcash[0]);
            form_data1.append('u_id', u_id);
            form_data1.append('amount', amount);
            form_data1.append('title', title);

            $.ajax({
                url: '../includes/payment.php',
                type: 'post',
                data: form_data1,
                contentType: false,
                processData: false,
                success: function(res){
                    alert(res);
                    window.location.reload('transactions.php')
                }
            })
          }
    })
})