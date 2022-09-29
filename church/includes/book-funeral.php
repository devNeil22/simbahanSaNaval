<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once '../includes/connection.inc.php';
    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $id = $_POST['id'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    $relationship = $_POST['relationship'];
    $d_bday = $_POST['d_bday'];
    $d_death = $_POST['d_death'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $myName = $_POST['myName'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $priest_id = $_POST['priest_id'];
    //certificate
    $certificate = $_FILES['certificate']['name'];
    $size = $_FILES['certificate']['size'];
    $type = $_FILES['certificate']['type'];
    $tmp_name = $_FILES['certificate']['tmp_name'];

    $source = '../files/';
    $certCopy = 'C:/xampp/htdocs/Naval_church/church-admin/files';
    $fileExt = explode('.', $certificate);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

    if(in_array($filexActualExt, $allowed)){
        $directory = $source.$certificate;
        move_uploaded_file($tmp_name, $directory);
        copy($directory, $certCopy.'/'.$certificate);
        //death certificate
        $b_certificate = $_FILES['b_certificate']['name'];
        $size = $_FILES['b_certificate']['size'];
        $type = $_FILES['b_certificate']['type'];
        $tmp_name = $_FILES['b_certificate']['tmp_name'];

        $fileExt = explode('.', $certificate);
        $filexActualExt = strtolower(end($fileExt));

        if(in_array($filexActualExt, $allowed)){
            $directory = $source.$b_certificate;
            move_uploaded_file($tmp_name, $directory);
            copy($directory, $certCopy.'/'.$b_certificate);
            $sql = "INSERT INTO funeral(priest_id ,date, Message, deacesed_name, relationship, bday, death_date, death_cert, birth_cert, u_id, Time, status, year, Month, amount)
                VALUES('$priest_id','$date', '$message', '$name', '$relationship', '$d_bday', '$d_death', '$certificate', '$b_certificate', '$id', '$time', 0, '$year', '$month', 3000)
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
                        Hai <h4>$myName</h4>,
                        
                        =========You have been reserved for a FUNERAL SCHEDULE!========<br>
                        Reservation Info:<br>
                        Date: $date,<br>
                        Time: $time,<br>
                        Deceased Name: $name,<br>

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
            echo 'fail to upload file! only image is allowed';
        }

        //copy( $directory, $t_destination.'/'.$image);
        //copy( $directory, $s_destination.'/'.$image);
    }else{
        echo 'fail to upload file! only image is allowed';
    }