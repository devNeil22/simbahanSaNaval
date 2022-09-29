<?php
    require_once './connection.inc.php';
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "UPDATE `admin` SET 
    `email`='$email',
    `username`='$username',
    `password`='$password'
     WHERE 1";
     $exe = mysqli_query($connection, $sql);

     if(!$exe){
         echo mysqli_error($connection);
     }else{
         echo 'profile edited successfully';
     }
    