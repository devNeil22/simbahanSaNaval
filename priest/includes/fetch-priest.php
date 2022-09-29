<?php
    require_once './connection.inc.php';


    $sql = "SELECT * FROM priests";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
               <tr>
                        <td style="display: flex; align-items: center">
                            <div>
                                <?php if($data['profile_pic'] == ""){?>
                                <img src="../image/1602cf278cae5b7.78511636.webp" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                                <?php } else{?>
                                <img src="../files/<?=$data['profile_pic']?>" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                                <?php }?>
                            </div>
                            <div>
                                <a href="#"><?=$data['Last_name']?> <?=$data['First_Name']?></a><br><span style="font-size: 12px;"><?=$data['email']?></span> 
                            </div>
                           
                        </td>
                        <td><?=$data['Position']?></td>
                        <td><?=$data['Address']?></td>
                        <td>
                            <button class="delete btn" id="delete" data-id="<?=$data['priest_id']?>"><i class="fa-solid fa-trash"></i> </button>
                            <a class="profile btn btn-primary" data-id="<?=$data['priest_id']?>" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-eye"></i> </a>
                            <a href="./priestProfile.php?id=<?=$data['priest_id']?>" class="btn btn-success" data-id="<?=$data['priest_id']?>"><i class="fa-solid fa-pen"></i> </button>
                        </td>
                    </tr>
<?php       }
    }
?>

<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).data('id');
            var form_data = new FormData()
            form_data.append('id', id)
            if(confirm('Are you sure you want to delete this user?') == true){
                $.ajax({
                    type: 'post',
                    url: '../includes/deletePriest.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        alert(res)
                       window.location.reload('priests.php')
                    }
                })
            }
        })

        $('.profile').click(function(){
            var id = $(this).data('id');
            var form_data = new FormData()
            form_data.append('id', id)
                $.ajax({
                    type: 'post',
                    url: '../includes/priestProfile.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                       $('#user').html(res)
                       //window.location.reload('members.php')
                    }
                })
            
        })
    })
</script>