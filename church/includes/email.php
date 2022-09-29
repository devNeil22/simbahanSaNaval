<?php
    require_once 'connection.inc.php';

    $email = $_POST['email'];
    
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $exe = mysqli_query($connection, $sql);
    if(!mysqli_num_rows($exe) > 0){
        echo '<span style="color: green;"><i class="fa-solid fa-check"></i> Email Available</span>';
    }else{
        echo '<i class="fa-solid fa-circle-exclamation"></i> Email Already Taken';
    }

?>