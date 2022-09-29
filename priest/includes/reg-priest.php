<?php

    use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $last = $_POST['last'];
    $first = $_POST['first'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $password = substr(uniqid(), 6);

    $profile = $_FILES['profile']['name'];
    $size = $_FILES['profile']['size'];
    $type = $_FILES['profile']['type'];
    $tmp_name = $_FILES['profile']['tmp_name'];

    $source = '../files/';
    $fileExt = explode('.', $profile);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

    if(in_array($filexActualExt, $allowed)){
        $directory = $source.$profile;
        move_uploaded_file($tmp_name, $directory);

        $sql = "INSERT INTO priests(profile_pic, Last_name, First_Name, email, Position, password, username, year, month)
                VALUES('$profile', '$last', '$first', '$email', '$position', '$password', '$username', '$year', '$month')
            ";
            $exe = mysqli_query($connection, $sql);
            if(!$exe){
                echo mysqli_error($connection);
            }else{
                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = "ssl://smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "dioceseofnaval22@gmail.com";
                $mail->Password = "admin2022";
                $mail->Port = 465; //587
                $mail->SMTPSecure = "ssl"; //tls
                $mail->isHTML(true);
                //$mail->setFrom($myEmail, $name);
                $mail->addAddress($email);
                $mail->Subject = "Diocese of Naval Reservation System";
                $mail->Body = "
                        Hai <h4>$last $first</h4>,
                        
                        <bold>=========You have been registered!========</bold><br>
                        User Info:<br><br>
                        <bold>Full Name</bold>: $last $first,<br>
                        <bold>Address</bold>: $position,<br>
                        <bold>Username</bold>: $username<br>
                        <bold>Password</bold>: $password<br>
                        <br>
                        <br>
                        You can now login to the platform!<br>
                        We hope this platform can help you!
                        thank you and God bless!

                    ";
                if($mail->send()){
                    //echo 'Booked Successfully: Confirmation sent!';
                }else{
                    $notSent = true;
                    echo $mail->ErrorInfo;
                }
            }
    }else{
        echo 'only image is allowed';
    }
