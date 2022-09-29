<?php

    require_once './connection.inc.php';
    $t_id = $_POST['t_id'];

    $command = "DELETE FROM time WHERE t_id = '$t_id'";
    $execute = mysqli_query($connection, $command);

    if(!$execute){
        echo mysqli_error($connection);
    }else{
        echo 'Time Deleted Successfully';
    }
                