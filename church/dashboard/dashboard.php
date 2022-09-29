<?php
    session_start();
    
    if(!isset($_SESSION['username']) || $_SESSION['loggedin'] !== true){
        header("Location: ../forms/login.php");
        exit;
    }elseif($_SESSION['confirmed'] == 0){
        header("location: ../forms/confirmation.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
    <title>Dioses of Naval</title>
</head>
<body>
    <div class="container-fluid">
        <div class="m-nav">
            <div class="logo"><img src="../image/logo.jpg" alt=""></div>
            <ul class="list">
                <li><a href="./dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="./donate.php"><i class="fa-solid fa-hand-holding-medical"></i> Donate</a></li>
                <li id="click-appoint"><a style="cursor: pointer;">
                    <i class="fa-solid fa-calendar-days"></i> Appointments <span class="down"><i class="fa-solid fa-angle-right"></i></span></a>
                </li>
                <ul class="appoint">
                    <li><a href="../christening/transactions.php"><i class="fa-solid fa-star"></i> Christening</a></li>
                    <li><a href="../funeral/transactions.php"><i class="fa-solid fa-star"></i> Funeral</a></li>
                    <li><a href="../holy-mass/transactions.php"><i class="fa-solid fa-star"></i> Holy Mass</a></li>
                    <li><a href="../wedding/transactions.php"><i class="fa-solid fa-star"></i> Wedding</a></li>
                </ul>
                <li><a style="cursor: pointer;" id="prof"><i class="fa-solid fa-user"></i> Profile <span class="lahi"><i class="fa-solid fa-angle-right"></i></span></a></li>
                <ul class="prof1">
                    <li><a href="../profile/profile-settings.php"><i class="fa-solid fa-user-gear"></i> Profile Settings</a></li>
                    <li><a href="../profile/profile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="#" id="log-out"><i class="fa-solid fa-power-off"></i> Log Out</a></li>
                </ul>
                 <li><a href="#">
                      <?php
                                    include '../includes/connection.inc.php';
                                    $name = $_SESSION['id'];
                                    $sql = "SELECT * FROM users WHERE u_id = '$name'";
                                    $exe = mysqli_query($connection, $sql);
                                    $get = mysqli_fetch_assoc($exe);
                                ?>
                                <?php
                                    if($get['image'] == ""){?>
                                        <img class="rounded" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                <?php  }else{?>
                                    <img class="rounded" src="../files/<?=$get['image']?>">
                                <?php }
                                ?>
                    </a>
                </li>
            </ul>
        </div>
        <br><br><br><br>
        <div class="activities">
            <div class="act-items">
                <div class="head">
                    <center><h4><i class="fa-solid fa-bookmark"></i> Wedding Appointment</h4></center>
                </div>
                <div class="body">
                    <center><a href="../wedding/priests.php?title=Wedding Reservation" class="btn">See Booking Requirements <i class="fa-solid fa-angles-right"></i></a></center>
                </div>
            </div>
            <div class="act-items">
                <div class="head">
                     <center><h4><i class="fa-solid fa-bookmark"></i> Holy Mass Booking</h4></center>
                </div>
                <div class="body">
                    <center><a href="../holy-mass/priests.php?title=Holy Mass" class="btn">See Booking Requirements <i class="fa-solid fa-angles-right"></i></a></center>
                </div>
            </div>
            <div class="act-items">
                <div class="head">
                     <center><h4><i class="fa-solid fa-bookmark"></i> Christening Booking</h4></center>
                </div>
                <div class="body">
                    <center><a href="../christening/priests.php?title=Christening Booking" class="btn">See Booking Requirements <i class="fa-solid fa-angles-right"></i></a></center>
                </div>
            </div>
            <div class="act-items">
                <div class="head">
                     <center><h4><i class="fa-solid fa-bookmark"></i> Funeral Appointments</h4></center>
                </div>
                <div class="body">
                    <center><a href="../funeral/priests.php?title=Funeral Reservation" class="btn">See Booking Requirements <i class="fa-solid fa-angles-right"></i></a></center>
                </div>
            </div>
        </div>
        <div class="footer" id="contact">
                <div class="info">
                    <div>
                        <p><i class="fa-solid fa-phone"></i>(053) 500 9355</p>
                        <a href="https://web.facebook.com/Naval-Cathedral-246439899353291" target="_blank"><i class="fa-brands fa-facebook-messenger"></i> Send Message</a>
                        <p><i class="fa-solid fa-envelope"></i> Email Us: neilbryangaviola02@gmail.com</p>
                        <center><p>"Jesus took with him Peter and John and James and went up the mountain to PRAY.. "</p></center>
                    </div>
                </div>
                <div class="image">
                    <img src="../image/42965170_246440336019914_6152641192409432064_n.jpg" alt="">
                </div>
            </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>