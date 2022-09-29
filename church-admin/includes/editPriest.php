<?php
    require_once './connection.inc.php';
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    $sql = "UPDATE `priests` SET 
    `Last_name`='$last',
    `First_Name`='$first',
    `Address`='$address',
    `email`='$email',
    `Position`='$position',
    `password`='$password'
     WHERE `priest_id`= '$id'";
     $exe = mysqli_query($connection, $sql);

     if(!$exe){
         echo mysqli_error($connection);
     }else{
         echo 'profile edited successfully';
     }
    