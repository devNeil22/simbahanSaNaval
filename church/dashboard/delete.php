<?php

    require_once '../includes/connection.inc.php';
    $id = $_POST['id'];

    $command = "DELETE FROM `donation` WHERE d_id = $id";
    $exe = mysqli_query($connection, $command);

    if(!$exe){
        echo mysqli_error($connection);
    }else{
        echo 'deleted';
    }

?>