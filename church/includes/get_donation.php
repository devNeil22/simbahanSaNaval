<?php
    require_once './connection.inc.php';
    $id = $_POST['id'];
    $sql = "SELECT * From donation WHERE u_id = $id ORDER BY d_id DESC";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
                 <tr>
                    <td class="date" data-date="<?=$data['amount']?>"><?=$data['amount']?></td>
                    <td class="name" data-date="<?=$data['Date']?>"><?=$data['Date']?></td>
                </tr>
<?php       }
    }
?>

<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).data('id');
            //var name = $('#name').data('name')
            var form_data = new FormData()
            form_data.append('id', id)
            if(confirm('Are you sure you want to delete this donation record?') == true){
                $.ajax({
                    type: 'post',
                    url: 'delete.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                       window.location.reload('donation.php')
                    }
                })
            }
        })

        $('.confirm').click(function(){
             var id = $(this).data('id');
             var name = $('.name').data('name')
             var email = $('.email').data('email')
             var date = $('.date').data('date')
             var user = $('.user').data('user')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
              form_data.append('user', user)

              if(confirm('Are you sure you want to confirm this reservation?') == true){
                $('#sending').modal('show')
                $.ajax({
                    type: 'post',
                    url: 'confirm.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        //alert(res)
                        $('#sending').modal('hide');
                        $('#success').modal('show');
                        setTimeout(function(){
                            $('#success').modal('hide');
                        }, 3000)
                        setTimeout(() => {
                            window.location.reload('transactions.php')
                        }, 3000);
                    }
                })
            }
        })

        $('.cancel').click(function(){
             var id = $(this).data('id');
             var name = $('.name').data('name')
             var email = $('.email').data('email')
             var date = $('.date').data('date')
             var user = $('.user').data('user')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
              form_data.append('user', user)

              if(confirm('Are you sure you want to cancel this reservation?') == true){
                $('#sending').modal('show')
                $.ajax({
                    type: 'post',
                    url: 'cancel.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        //alert(res)
                        $('#sending').modal('hide');
                        $('#cancel').modal('show');
                        setTimeout(function(){
                            $('#cancel').modal('hide');
                        }, 3000)
                        setTimeout(() => {
                            window.location.reload('transactions.php')
                        }, 3000);
                    }
                })
            }
        })
    })
</script>