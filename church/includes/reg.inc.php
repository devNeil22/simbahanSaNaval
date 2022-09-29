<?php
    require_once '../includes/connection.inc.php';
    if(isset($_POST['check_email'])){
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response =  'please enter valid email!';
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $cmd = mysqli_query($connection, $sql);
            if(mysqli_num_rows($cmd) > 0){
                $response =  'email already exist!';
            }else{
                $response =  'email available';
            }
        }
        
    }
    exit(json_encode(array("response" => $response)));