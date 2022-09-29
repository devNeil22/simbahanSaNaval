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
        <div class="modal" id="d-cert">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Death Certificate</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" padding: 5px>
                <?php
                    require_once '../includes/connection.inc.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM users JOIN funeral ON users.u_id  = funeral.u_id WHERE f_id = $id";
                    $exe = mysqli_query($connection, $sql);
                    $info = mysqli_fetch_assoc($exe);
                ?>
                <img src="../files/<?=$info['death_cert']?>" alt="" style="width: 100%; height: 500px; border: 2px solid black">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>

        <div class="modal" id="d-birth">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                    require_once '../includes/connection.inc.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM users JOIN funeral ON users.u_id  = funeral.u_id WHERE f_id = $id";
                    $exe = mysqli_query($connection, $sql);
                    $info = mysqli_fetch_assoc($exe);
                ?>
                <img src="../files/<?=$info['birth_cert']?>" alt="" style="width: 100%; height: 500px; border: 2px solid black">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        <div class="m-nav">
            <div class="logo"><img src="../image/logo.jpg" alt=""></div>
            <ul class="list">
                <li><a href="../dashboard/dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                 <li><a href="../dashboard/donate.php"><i class="fa-solid fa-hand-holding-medical"></i> Donate</a></li>
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
        <div class="activities1">
            <div class="title"><center><h3>Hai <?=$_SESSION['username']?>!</h3></center></div>
            
            <div class="form1">
                <?php
                    require_once '../includes/connection.inc.php';
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM users JOIN holy_mass ON users.u_id  = holy_mass.u_id WHERE mass_id = $id";
                    $exe = mysqli_query($connection, $sql);
                    $info = mysqli_fetch_assoc($exe);

                    $priest_id = $info['priest_id'];
                    $sqlp = "SELECT * FROM priests WHERE priest_id = '$priest_id'";
                    $exep = mysqli_query($connection, $sqlp);
                    $infop = mysqli_fetch_assoc($exep);
                ?>    
                <p>Thank you for using our platform!</p>
                <p>This is your booking information for Holy Mass Reservation</p>
                <p>Choosen priest: <?=$infop['PLast_name'].' '.$infop['PFirst_Name']?></p>
                <span>Date of Appointment: <i class="fa-solid fa-calendar-days"></i> <span style="font-weight: bold;"> <?=$info['date']?></span></span><br><br>
                <span>Time: <i class="fa-solid fa-clock"></i> <span style="font-weight: bold;"> <?=$info['time']?></span></span><br><br>
                
                <p>Your transaction has been recorded!</p>
                <p>Please wait for our call and approval of reservation Thank you!</p>
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