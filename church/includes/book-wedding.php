<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require_once './connection.inc.php';
     require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $id = $_POST['id'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $nameGroom = $_POST['nameGroom'];
    $nameBride = $_POST['nameBride'];
    $email = $_POST['email'];
    $myName = $_POST['myName'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $priest_id = $_POST['priest_id'];

    $cenomar = $_FILES['cenomar']['name'];
    $size = $_FILES['cenomar']['size'];
    $type = $_FILES['cenomar']['type'];
    $tmp_name = $_FILES['cenomar']['tmp_name'];

    $source = '../files/';
    $cenomarCopy = 'C:/xampp/htdocs/Naval_church/church-admin/files';
    $fileExt = explode('.', $cenomar);
    $filexActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webg');

     if(in_array($filexActualExt, $allowed)){
        $directory = $source.$cenomar;
        move_uploaded_file($tmp_name, $directory);
        copy($directory, $cenomarCopy.'/'.$cenomar);
        $bg_certificate = $_FILES['bg_certificate']['name'];
        $size = $_FILES['bg_certificate']['size'];
        $type = $_FILES['bg_certificate']['type'];
        $tmp_name = $_FILES['bg_certificate']['tmp_name'];

        $source = '../files/';
        $certificateCopy = 'C:/xampp/htdocs/Naval_church/church-admin/files';
        $fileExt = explode('.', $bg_certificate);
        $filexActualExt = strtolower(end($fileExt));

        if(in_array($filexActualExt, $allowed)){
            $directory = $source.$bg_certificate;
            move_uploaded_file($tmp_name, $directory);
            copy($directory, $certificateCopy.'/'.$bg_certificate);
            $bb_certificate = $_FILES['bb_certificate']['name'];
            $size = $_FILES['bb_certificate']['size'];
            $type = $_FILES['bb_certificate']['type'];
            $tmp_name = $_FILES['bb_certificate']['tmp_name'];

            $source = '../files/';
            $fileExt = explode('.', $bb_certificate);
            $filexActualExt = strtolower(end($fileExt));

            if(in_array($filexActualExt, $allowed)){
                $directory = $source.$bb_certificate;
                move_uploaded_file($tmp_name, $directory);

                $sql = "INSERT INTO wedding(priest_id,date, groom, bride, groom_cert, bride_cert, cenomar, u_id, message, status, year, Month, amount)
                VALUES('$priest_id', '$date', '$nameGroom', '$nameBride', '$bg_certificate', '$bb_certificate', '$cenomar', '$id', '$message', 0, '$year', '$month', 2500)
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
                        
                        =========You have been reserved for a WEDDING SCHEDULE!========<br>
                        Reservation Info:<br>
                        Date: $date,<br>
                       
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
                echo 'fail to upload your file! image is only allowed';
            }
        }else{
            echo 'fail to upload your file! image is only allowed';
        }

     }else{
         echo 'fail to upload your file! image is only allowed';
     }
