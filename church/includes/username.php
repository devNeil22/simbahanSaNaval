<?php
    require_once 'connection.inc.php';

    $user = $_POST['username'];
    
    $sql = "SELECT username FROM users WHERE username = '$user'";
    $exe = mysqli_query($connection, $sql);
    if(!mysqli_num_rows($exe) > 0){
        echo '<span style="color: green;"><i class="fa-solid fa-check"></i> Username Available</span>';
    }else{
        echo '<i class="fa-solid fa-circle-exclamation"></i> Username Already Exist';
    }

?>