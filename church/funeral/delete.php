<?php

    require_once '../includes/connection.inc.php';
    $id = $_POST['id'];

    $command = "DELETE FROM `funeral` WHERE f_id = $id";
    $exe = mysqli_query($connection, $command);

    if(!$exe){
        echo mysqli_error($connection);
    }else{
        echo 'deleted';
    }

    $sql = "SELECT * FROM users JOIN funeral ON users.u_id = funeral.u_id ORDER BY users.u_id DESC";
    $exe = mysqli_query($connection, $sql);

    if(mysqli_num_rows($exe) > 0){
        while($data = mysqli_fetch_assoc($exe)){?>
                <tr>
                    <td>
                        <?php if($data['image'] == ""){?>
                        <img src="../image/1602cf278cae5b7.78511636.webp" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php } else{?>
                        <img src="../image/<?=$data['image']?>" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php }?>
                        <a href="./profile.php?id=<?=$data['u_id']?>" data-name="<?=$data['Last_name']?> <?=$data['First_Name']?>" id="name"> <?=$data['Last_name']?> <?=$data['First_Name']?></a>
                    </td>
                    <td><?=$data['Mobile']?></td>
                    <td><?=$data['email']?></td>
                    <td><?=$data['date']?></td>
                    <td><?=$data['Time']?></td>
                    <?php if($data['status'] == 0){?>
                         <td><center><h4 style="color: red;">X</h4></center></td>
                    <?php }else{ ?>
                        <td><h6 style="color: green;">Approved</h6></td>
                    <?php }?>
                    <td>
                        <button class="btn" id="delete" data-id="<?=$data['f_id']?>"><i class="fa-solid fa-trash"></i></button>
                        <a  href="#" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <button class="btn btn-success"><i class="fa-solid fa-thumbs-up"></i></button>
                    </td>
                </tr>
   <?php     }
    }?>