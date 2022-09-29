<?php
    require_once './connection.inc.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM users JOIN wedding ON users.u_id = wedding.u_id WHERE users.u_id = '$id' ORDER BY wedding.w_id DESC";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
                 <tr>
                    <td class="date" data-date="<?=$data['date']?>"><?=$data['date']?></td>
                    <?php if($data['status'] == 0){?>
                         <td><center><h4 style="color: red;">X</h4></center></td>
                    <?php }else{ ?>
                        <td><h6 style="color: green;">Approved</h6></td>
                    <?php }?>
                    <td>
                        <button class="delete btn btn-warning" id="delete" data-id="<?=$data['w_id']?>"><i class="fa-solid fa-trash"></i></button>
                        <a  href="../wedding/thankyou.php?id=<?=$data['w_id']?>"" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                         <a href="../holy-mass/pay.php?id=<?=$data['w_id']?>&title=Wedding Reservation" class="btn btn-success" data-id="<?=$data['mass_id']?>"><i class="fa-solid fa-money-bill-1-wave"></i></a>
                    </td>
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
            if(confirm('Are you sure you want to delete this reservation?') == true){
                $.ajax({
                    type: 'post',
                    url: 'delete.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                       window.location.reload('transactions.php')
                    }
                })
            }
        })

         $('.confirm').click(function(){
             var id = $(this).data('id');
             var name = $('.name').data('name')
             var email = $('.email').data('email')
             var date = $('.date').data('date')
             var user = $('.user').data('name')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
              form_data.append('user', user)
              //form_data.append('oras', oras)

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
             var user = $('.user').data('name')
             //var user = $('.time').data('time')
             //var oras = $('.oras').data('oras')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
             // form_data.append('user', user)
              //form_data.append('oras', oras)

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