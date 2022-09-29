<?php
    require_once './connection.inc.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM users JOIN christening ON users.u_id = christening.u_id WHERE christening.u_id = '$id' ORDER BY christening.c_id desc";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
                 <tr>
                    <td class="date" data-date="<?=$data['date']?>"><?=$data['date']?></td>
                    <td class="name" data-date="<?=$data['name']?>"><?=$data['name']?></td>
                     <?php if($data['status'] == 0){?>
                         <td><center><h4 style="color: red;">X</h4></center></td>
                    <?php }else{ ?>
                        <td><h6 style="color: green;">Approved</h6></td>
                    <?php }?>
                    <td>
                        <button class="delete btn btn-warning" data-id="<?=$data['c_id']?>"><i class="fa-solid fa-trash"></i></button>
                        <a  href="../christening/thankyou.php?id=<?=$data['c_id']?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="../christening/pay.php?id=<?=$data['c_id']?>&title=Christening Reservation" class="btn btn-success" data-id="<?=$data['mass_id']?>"><i class="fa-solid fa-money-bill-1-wave"></i></a>
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