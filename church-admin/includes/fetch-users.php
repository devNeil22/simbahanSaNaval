<?php
    require_once './connection.inc.php';

    $title = $_POST['title'];

    $sql = "SELECT * FROM users ORDER BY u_id DESC";
    $execute = mysqli_query($connection, $sql);
    if(mysqli_num_rows($execute)){
        while($data = mysqli_fetch_assoc($execute)){?>
                <tr>
                    <td style="display: flex;align-items: center;">
                        <?php if($data['image'] == ""){?>
                        <img src="../image/1602cf278cae5b7.78511636.webp" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php } else{?>
                        <img src="../files/<?=$data['image']?>" alt="" style="height: 50px; width: 50px; margin-right: 5px">
                        <?php }?>
                        <a href="./profile.php?id=<?=$data['u_id']?>"> <?=$data['Last_name']?> <?=$data['First_Name']?></a>
                    </td>
                    <td><?=$data['email']?></td>
                    <td><?=$data['address']?></td>
                    <td>
                        <?php if($title == "Funeral Reservation"){?>
                            <a href="./book.php?t=Funeral Reservation&id=<?=$data['u_id']?>" data-id="<?=$data['u_id']?>" class="btn btn-warning"><i class="fa-solid fa-address-book"></i></a>
                        <?php } ?>
                        <?php if($title == "Holy Mass"){?>
                            <a href="./book.php?t=Holy Mass&id=<?=$data['u_id']?>" data-id="<?=$data['u_id']?>" class="btn btn-warning"><i class="fa-solid fa-address-book"></i></a>
                        <?php } ?>
                        <?php if($title == "Wedding Reservation"){?>
                            <a href="./book.php?t=Wedding Reservation&id=<?=$data['u_id']?>" data-id="<?=$data['u_id']?>" class="btn btn-warning"><i class="fa-solid fa-address-book"></i></a>
                        <?php } ?>
                        <?php if($title == "Christening Reservation"){?>
                            <a href="./book.php?t=Christening Reservation&id=<?=$data['u_id']?>" data-id="<?=$data['u_id']?>" class="btn btn-warning"><i class="fa-solid fa-address-book"></i></a>
                        <?php } ?>
                    </td>
                </tr>
<?php       }
    }
?>