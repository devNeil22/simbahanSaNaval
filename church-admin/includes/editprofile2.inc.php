<?php
    require_once './connection.inc.php';
    $first = $_POST['first'];
    $last = $_POST['last'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "UPDATE `users` SET 
    `Last_name`='$last',
    `First_Name`='$first',
    `Gender`='$gender',
    `Address`='$address',
    `email`='$email',
    `Mobile`='$mobile',
    `Status`='$status',
    `username`='$username',
    `password`='$password'
     WHERE `u_id`= '$id'";
     $exe = mysqli_query($connection, $sql);

     if(!$exe){
         echo mysqli_error($connection);
     }else{
         echo 'profile edited successfully';
     }
    