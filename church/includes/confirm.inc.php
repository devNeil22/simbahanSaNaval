<?php
    require './connection.inc.php';
    $empty = false;
    $error = false;
    $sqlerror = false;
    $alert = false;

        $code = $_POST['code'];
        $id = $_POST['id'];
        
            $select = "SELECT * FROM users WHERE u_id = '$id'";
            $exe = mysqli_query($connection, $select);
            $get = mysqli_fetch_assoc($exe);
            $trial = $get['code'];

            if($code != $get['code']){
               echo 'Confirmation Not Valid!';
            }else{
                $update = "UPDATE users SET confirm = 1 WHERE u_id = '$id'";
                $exe = mysqli_query($connection, $update);
                if(!$exe){
                    //$sqlerror = true;
                    $info = mysqli_error($connection);
                    echo $info;
                }
            }
        
?>
