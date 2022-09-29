<?php
    require './connection.inc.php';

    if(isset($_POST['submit_headt'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $usernameEmpty = false;
        $password_empty = false;
        $wrongPassUserame = false;

        if(empty($username)){
            $usernameEmpty = true;
        }elseif(empty($password)){
            $password_empty = true;
        }else{
            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $exe = mysqli_query($connection, $sql);
            $fetch = mysqli_fetch_assoc($exe);

            if($rows = mysqli_num_rows($exe) > 0){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;

            }else{
                 $wrongPassUserame = true;
            }
        }

    }else{
        echo "<span>There was an error</span>";
    }

    if(isset($_POST['sign-out'])){
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        exit;
    }

?>

<script>   
    $(".username-error, .password-error, .login-success").html("");
    var password_empty = "<?php echo $password_empty?>";
    var username_empty = "<?php echo $usernameEmpty?>";
    var wrongPassUser = "<?php echo $wrongPassUserame?>";
    
    if(password_empty == true){
        $(".password-error").html("Enter Password!");
    }
    if(username_empty == true){
        $(".username-error").html("Enter Username!");
    }
    if(wrongPassUser == true){
        $(".login-success").html("Wrong Username or password!");
    }
    
    if(username_empty == false && password_empty == false && wrongPassUser == false){
        window.location.replace("./dashboard/dashboard.php");
    }
</script>








