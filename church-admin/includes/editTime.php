<?php

    require_once './connection.inc.php';
    $time = $_POST['time1'];
    $t_id = $_POST['t_id'];
    $timeZone = $_POST['timeZone'];

    $command = "UPDATE time SET Time = '$time', timeZone = '$timeZone' WHERE t_id = $t_id";
    $execute = mysqli_query($connection, $command);

    if(!$execute){
        echo mysqli_error($connection);
    }else{
        echo 'Time Edited Successfully'.$t_id;
    }