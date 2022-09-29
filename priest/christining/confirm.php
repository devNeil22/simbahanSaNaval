<?php

    use PHPMailer\PHPMailer\PHPMailer;
    require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $id = $_POST['id'];
    $myName = $_POST['user'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $name = $_POST['name'];

    $sql = "UPDATE christening SET status = 1 WHERE c_id = $id";
    $exe = mysqli_query($connection, $sql);

    if($exe){
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
                    Hai <h4>$myName</h4>,
                    
                    =========Your reservation has been APPROVED for a CHRISTENING SCHEDULE!========<br>
                    Reservation Info:<br>
                    Date: $date,<br>
                    Infant Name: $name<br>

                    Thank you for Trusting Us!

                    ";
            if($mail->send()){
                echo 'Booked Successfully: Confirmation sent!';
            }else{
                $notSent = true;
                echo $mail->ErrorInfo;
            }
    }else{
        echo mysqli_error($connection);
    }