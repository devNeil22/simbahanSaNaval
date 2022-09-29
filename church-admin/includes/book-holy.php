<?php
     use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
     require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    
    $id = $_POST['id'];
    $time = $_POST['time'];
    $message = $_POST['message'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $myName = $_POST['myName'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    $sql = "INSERT INTO holy_mass(date, time, u_id, message, status, year, Month) VALUES('$date', '$time', '$id', '$message', 0, '$year', '$month')";
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
                        Hai <h4>$myName</h4>,
                        
                        =========You have been reserved for a HOLY MASS SCHEDULE!========<br>
                        Reservation Info:<br>
                        Date: $date,<br>
                        Time: $time,<br>

                        Please see more information to your account! and prepare for that date and your payment
                        thank you and God bless!

                    ";
                if($mail->send()){
                    echo 'Booked Successfully: Confirmation sent!';
                }else{
                    $notSent = true;
                    echo $mail->ErrorInfo;
                }
            
    }