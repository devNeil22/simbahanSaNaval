<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
     require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    

    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $myName = $_POST['myName'];
    $year = $_POST['year'];
    $month = $_POST['month'];

    //certificate
    $cert = $_FILES['cert']['name'];
    $size = $_FILES['cert']['size'];
    $type = $_FILES['cert']['type'];
    $tmp_name = $_FILES['cert']['tmp_name'];

    $source = '../files/';
    $fileExt = explode('.', $cert);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

    if(in_array($filexActualExt, $allowed)){
        $directory = $source.$cert;
        move_uploaded_file($tmp_name, $directory);

        $sql = "INSERT INTO christening(date, name, cert, message, u_id, status, year, Month)
            VALUES('$date', '$name', '$cert', '$message', '$id', 0, '$year', '$month')
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
                        Hai <h4>$myName</h4>,
                        
                        =========You have been reserved for a CRESTENING SCHEDULE!========<br>
                        Reservation Info:<br>
                        Date: $date,<br>
                        Infant Name: $name<br>

                        We will Call you for your full information and for the time<br>
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

    }else{
        echo 'only Image is allowed';
    }