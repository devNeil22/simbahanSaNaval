<?php

use PHPMailer\PHPMailer\PHPMailer;

    include "./connection.inc.php";

    $error = false;
    $emptyUsername = $emptyLast = $emptyFirst = $emptyEmail = $emptyPassword = $emptyConfirm = $notmatch = $exist = $emaiexist = $emptyAdd = false;
    $sqlError = "";

    if(isset($_POST['r_submit'])){
        $last = mysqli_real_escape_string($connection, $_POST['last']);
        $first = mysqli_real_escape_string($connection, $_POST['first']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['pass']);
        //$confirm = mysqli_real_escape_string($connection, $_POST['confirm_password']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        //$month = $_POST['month'];
        //$year = $_POST['year'];
        $uniq = uniqid();
        $code = mb_substr($uniq, 0, 8);


        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";

                $test = "SELECT * From users WHERE username = '$username'";
                $get = mysqli_query($connection, $test);
                if(mysqli_num_rows($get) > 0){
                    //$exist = true;
                    echo 'username already exist!';
                }else{
                    $test = "SELECT * From users WHERE email = '$email'";
                    $get = mysqli_query($connection, $test);
                    if(mysqli_num_rows($get) > 0){
                        //$emaiexist = true;
                        echo 'email already taken';
                    }else{
                        $sql = "INSERT INTO users(Last_Name, First_Name, email, address, username, password, code, confirm) VALUES('$last', '$first', '$email', '$address', '$username', '$password', '$code', 0)";
                        $exe = mysqli_query($connection, $sql);
                        if(!$exe){
                            $sqlError = mysqli_error($connection);
                        }else{
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['registered'] = true; 
                            $_SESSION['id'] = $connection->insert_id;
                            $_SESSION['mail'] = $email;

                            $mail = new PHPMailer();

                            $mail->isSMTP();
                            $mail->Host = "ssl://smtp.gmail.com";
                            $mail->SMTPAuth = true;
                            $mail->Username = "dioceseofnaval22@gmail.com";
                            $mail->Password = "gzeqzxsojsahkpsg";
                            $mail->Port = 465; //587
                            $mail->SMTPSecure = "ssl"; //tls

                            $mail->isHTML(true);
                            $mail->setFrom($myEmail, $name);
                            $mail->addAddress($email);
                            $mail->Subject = 'Diosese of Naval';
                            $mail->Body = "
                                <h4>Welcome to Naval Church Online Booking System!</h4><br>
                                <p>Hai User!</p>
                                <p>$username</p>
                                <p>Enjoy the platform, hope that this platform will help you!</p>
                                <h1>Enter this Confirmation Code to Complete the Set up: $code</h1>
                            ";

                            if(!$mail->send()){
                                $notSent = true;
                                $errorInfo = $mail->ErrorInfo;
                                echo $errorInfo;
                            }else{
                                echo 'Confirmation code is sent to your email!';
                            }
                        } 
                    }   
                }   
    }else{
        echo 'There was an error please try again later!';
    }
?>

<script>
    /*$(document).ready(function(){
        $(".errconfirm, .erremail, .errlast, .errfirst, .errpass, .errusername, .erradd").html("")

        var errlast = "<?php echo $emptyLast?>"
        var errfirst = "<?php echo $emptyFirst?>"
        var erremail = "<?php echo $emptyEmail?>"
        var errusername = "<?php echo $emptyUsername?>"
        var errpass = "<?php echo $emptyPassword?>"
        var errconfirm = "<?php echo $emptyConfirm?>"
        var sqlError = "<?php echo $sqlError?>"
        var error = "<?php echo $error?>"
        var not = "<?php echo $notmatch?>"
        var exist = "<?php echo $exist?>"
        var emailexist = "<?php echo $emaiexist?>"
        var emptyAdd = "<?php echo $emptyAdd?>"

        if(errconfirm == true){
            $(".errconfirm").html("this is a required input!")
        }
        if(erremail == true){
            $(".errconfirm").html("this is a required input!")
        }
        if(errfirst == true){
            $(".erremail").html("this is a required input!")
        }
         if(errlast == true){
            $(".errlast").html("this is a required input!")
        }
         if(errusername == true){
            $(".errusername").html("this is a required input!")
        }
         if(errpass== true){
            $(".errpass").html("this is a required input!")
        }
        if(error ==true){
            $(".register-status").html("there was an error")
        }
        if(sqlError != "" ){
            alert(sqlError)
        }
        if(not == true){
            $(".errpass").html("password does not match!")
        }
        if(exist == true){
            $(".errusername").html("Username already Exist!")
        }
        if(emailexist == true){
            $(".erremail").html("This email address is already registered to this system, Please Try again!");
        }
        if(emailexist == true){
            $(".erradd").html("This field is required");
        }
        
        if(errconfirm == false && erremail == false && errfirst == false && errlast == false && errusername == false && errpass == false && error == false && sqlError == "" && not == false && exist == false && emailexist == false){
            window.location.replace("../forms/confirmation.php")
        }
    })*/
</script>