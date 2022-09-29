<?php
    require_once './connection.inc.php';

    $sql = "SELECT * FROM users JOIN holy_mass ON users.u_id = holy_mass.u_id";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
                 <tr>
                    <td>
                        <?php if($data['image'] == ""){?>
                        <img src="../image/1602cf278cae5b7.78511636.webp" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php } else{?>
                        <img src="../files/<?=$data['image']?>" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php }?>
                        <a href="./profile.php?id=<?=$data['u_id']?>" class="user" data-name="<?=$data['Last_name']?> <?=$data['First_Name']?>"> <?=$data['Last_name']?> <?=$data['First_Name']?></a>
                    </td>
                    <td><?=$data['Mobile']?></td>
                    <td class="email" data-email="<?=$data['email']?>"><?=$data['email']?></td>
                    <td class="date" data-date="<?=$data['date']?>"><?=$data['date']?></td>
                    <td class="oras" data-oras="<?=$data['time']?>"><?=$data['time']?></td>
                     <?php if($data['status'] == 0){?>
                         <td><center><h4 style="color: red;">X</h4></center></td>
                    <?php }else{ ?>
                        <td><h6 style="color: green;">Approved</h6></td>
                    <?php }?>
                    <td>
                        <button class="delete btn" id="delete" data-id="<?=$data['mass_id']?>"><i class="fa-solid fa-trash"></i></button>
                        <a  href="../holy-mass/trans-info.php?id=<?=$data['mass_id']?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                       <?php if($data['status'] == 0){?>
                         <button class="confirm btn btn-success" data-id="<?=$data['mass_id']?>"><i class="fa-solid fa-thumbs-up"></i></button>
                        <?php }else{ ?>
                            <button class="cancel btn btn-danger" data-id="<?=$data['mass_id']?>"><i class="fa-solid fa-ban"></i></button>
                        <?php }?>
                    </td>
                </tr>
<?php       }
    }
?>


<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).data('id');
            var name = $('#name').data('name')
            var form_data = new FormData()
            form_data.append('id', id)
            if(confirm('Are you sure you want to delete '+name+'`s reservation?') == true){
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
             var oras = $('.oras').data('oras')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
              form_data.append('user', user)
              form_data.append('oras', oras)

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
             var user = $('.time').data('time')
             var oras = $('.oras').data('oras')
            var form_data = new FormData()

              form_data.append('id', id)
              form_data.append('name', name)
              form_data.append('email', email)
              form_data.append('date', date)
              form_data.append('user', user)
              form_data.append('oras', oras)

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