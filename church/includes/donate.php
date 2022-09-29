<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
     require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";
    

    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $message = $_POST['message'];
    $email = $_POST['email'];
   // $date = date_create();
    //$timeStamp = date_time_set($date);
    //$gcash = $_POST['gcash'];

    //certificate
    $gcash = $_FILES['gcash']['name'];
    $size = $_FILES['gcash']['size'];
    $type = $_FILES['gcash']['type'];
    $tmp_name = $_FILES['gcash']['tmp_name'];

    $source = '../files/';
    $copyTo = 'C:/xampp/htdocs/Naval_church/church-admin/files';
    $fileExt = explode('.', $gcash);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

    if(in_array($filexActualExt, $allowed)){
        $directory = $source.$gcash;
        move_uploaded_file($tmp_name, $directory);
        copy( $directory, $copyTo.'/'.$gcash);
        $sql = "INSERT INTO donation(u_id ,amount, gcash_ss, message)
            VALUES('$id', '$amount', '$gcash', '$message')
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
                $mail->Password = "gzeqzxsojsahkpsg";
                $mail->Port = 465; //587
                $mail->SMTPSecure = "ssl"; //tls
                $mail->isHTML(true);
                //$mail->setFrom($myEmail, $name);
                $mail->addAddress($email);
                $mail->Subject = "Diocese of Naval Reservation System";
                $mail->Body = "
                        
                        =========Your Donation Has Been Received!========<br>
                        Donation Info:<br>
                        Amount: $amount,<br>

                        Thank you for your donation, we will ensure that this donation is in good 
                        hands. Thank you for your golden heart, more blessings to come! More power!

                    ";
                if($mail->send()){
                    //echo 'Booked Successfully: Confirmation sent!';
                }else{
                    $notSent = true;
                    echo $mail->ErrorInfo;
                }
            
    }

    }else{
        echo 'only Image is allowed';
    }