<?php
    require_once '../includes/connection.inc.php';
    $image = $_FILES['my_pic']['name'];
    $size = $_FILES['my_pic']['size'];
    $type = $_FILES['my_pic']['type'];
    $tmp_name = $_FILES['my_pic']['tmp_name'];

    $head_id = $_POST['id'];

    $source = '../files/';
    //$t_destination = 'C:/xampp/htdocs/E-module/Teacher/image';
    //$s_destination = 'C:/xampp/htdocs/E-module/Student/image';

    
    $fileExt = explode('.', $image);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

    if(in_array($filexActualExt, $allowed)){
        $directory = $source.$image;
        move_uploaded_file($tmp_name, $directory);
        //copy( $directory, $t_destination.'/'.$image);
        //copy( $directory, $s_destination.'/'.$image);

        $sql = "UPDATE `priests` SET `profile_pic` = '$image' WHERE priest_id = '$head_id'";
        $exe = mysqli_query($connection, $sql);
        if(!$exe){
            echo mysqli_error($connection);
        }else{
            echo 'Profile Picture Changed';
        }
    }else{
        echo 'only image is allowed!';
    }
    