<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
    require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $email = $_POST['email'];
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $month = $_POST['month'];
    $year = date("Y");

    $sql = "INSERT INTO donation(u_id, amount, month, year) VALUES($id, $amount, '$month', $year)";
    $exe = mysqli_query($connection, $sql);
    if(!$exe){
        echo mysqli_error($connection);
    }else{
        $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = "ssl://smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "dioceseofnaval22@gmail.com";
                $mail->Password = "gzeqzxsojsahkpsg";
                $mail->Port = 465; //587
                $mail->SMTPSecure = "ssl"; //tls
                $mail->isHTML(true);
                //$mail->setFrom($myEmail, $name);
                $mail->addAddress($email);
                $mail->Subject = "Diocese of Naval Reservation System";
                $mail->Body = "
                        =========Your Donation is Received!========<br>
                        Amount: $amount<br>

                        Thank you for your most generous donation!<br>
                        We are so fortunate to have caught the attention of people like you with large warm hearts.

                        <br>
                        You are Highly Appreciated, Thank You and Godbless!

                    ";
                if($mail->send()){
                    echo 'Donation Added Successfully';
                }else{
                    $notSent = true;
                    echo $mail->ErrorInfo;
                }
    }
?>