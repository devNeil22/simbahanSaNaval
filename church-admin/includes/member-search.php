<?php
    require_once './connection.inc.php';

    if(isset($_POST['search'])){

        $search = $_POST['search'];

        $query = "SELECT * FROM users WHERE First_Name LIKE '{$search}%' OR Last_name LIKE '{$search}%' OR address LIKE '{$search}%' ORDER BY u_id DESC";
        $exe = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($exe)){
            while($data = mysqli_fetch_assoc($exe)){ ?>

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
                            <button class="delete btn" id="delete" data-id="<?=$data['u_id']?>"><i class="fa-solid fa-trash"></i> </button>
                            <a class="profile btn btn-primary" data-id="<?=$data['u_id']?>" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-eye"></i> </a>
                            <a href="./profile.php?id=<?=$data['u_id']?>" class="btn btn-success" data-id="<?=$data['u_id']?>"><i class="fa-solid fa-pen"></i> </button>
                        </td>
                    </tr>
                
        <?php }
        }else {
            echo "<h6 style='color:red'>no match found</h6>";
        }
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
                    url: 'delete.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        alert(res)
                       window.location.reload('members.php')
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
                    url: '../includes/fetchProfile.php',
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