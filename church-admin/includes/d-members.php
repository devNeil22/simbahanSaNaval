<?php
    require_once './connection.inc.php';


    $sql = "SELECT * FROM users ORDER BY u_id DESC";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
               <tr>
                        <td style="display: flex; align-items: center">
                            <div>
                                <?php if($data['image'] == ""){?>
                                <img src="../image/1602cf278cae5b7.78511636.webp" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                                <?php } else{?>
                                <img src="../files/<?=$data['image']?>" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                                <?php }?>
                            </div>
                            <div>
                                <a href="#"><?=$data['Last_name']?> <?=$data['First_Name']?></a><br><span style="font-size: 12px;"><?=$data['email']?></span> 
                            </div>
                           
                        </td>
                        <td><?=$data['Mobile']?></td>
                        <td><?=$data['address']?></td>
                        <td>
                            <button class="donate btn btn-primary" id="donate" data-id="<?=$data['u_id']?>"><i class="fa-solid fa-hand-holding-dollar"></i> </button>
                        </td>
                    </tr>
<?php       }
    }
?>

<script>
    $(document).ready(function(){
        $('.donate').click(function(){
            var id = $(this).data('id');
            var form_data = new FormData()
            form_data.append('id', id)

            $.ajax({
                url: '../dashboard/add-donate.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(res){
                    $('.activities1').html(res)
                }
            })
        })
    })
</script>