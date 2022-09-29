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
                <li><a href="#"><i class="fa-solid fa-calendar-days"></i> Appointments</a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i> Profile</a></li>
                <li><a href="#"><img src="../image/1602cf278cae5b7.78511636.webp" class="rounded" alt=""></a></li>
            </ul>
        </div>
        <br><br><br><br>
        <div class="activities1">
            <div class="title"><center><h3>My Appointments</h3></center></div>
            <div class="items">
                <div>
                    <span><i class="fa-solid fa-calendar-days"></i> March 22, 2020</span><br>
                    <span><i class="fa-solid fa-clock"></i> 10:00 AM - 11:00</span>
                </div>
                <div>
                    <button class="btn"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button>
                    <button class="btn" id="delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    <button class="btn" id="edit"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>

            <div class="items">
                <div>
                    <span><i class="fa-solid fa-calendar-days"></i> March 22, 2020</span><br>
                    <span><i class="fa-solid fa-clock"></i> 10:00 AM - 11:00</span>
                </div>
                <div>
                    <button class="btn"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button>
                    <button class="btn" id="delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    <button class="btn" id="edit"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>

            <div class="items">
                <div>
                    <span><i class="fa-solid fa-calendar-days"></i> March 23, 2020</span><br>
                    <span><i class="fa-solid fa-clock"></i> 10:00 AM - 11:00</span>
                </div>
                <div>
                    <button class="btn"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button>
                    <button class="btn" id="delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    <button class="btn" id="edit"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>

            <div class="items">
                <div>
                    <span><i class="fa-solid fa-calendar-days"></i> March 23, 2020</span><br>
                    <span><i class="fa-solid fa-clock"></i> 10:00 AM - 11:00</span>
                </div>
                <div>
                    <button class="btn"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button>
                    <button class="btn" id="delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    <button class="btn" id="edit"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>

            <div class="items">
                <div>
                    <span><i class="fa-solid fa-calendar-days"></i> March 23, 2020</span><br>
                    <span><i class="fa-solid fa-clock"></i> 10:00 AM - 11:00</span>
                </div>
                <div>
                    <button class="btn"><i class="fa-solid fa-rectangle-xmark"></i> Cancel</button>
                    <button class="btn" id="delete"><i class="fa-solid fa-trash"></i> Delete</button>
                    <button class="btn" id="edit"><i class="fa-solid fa-pen"></i> Edit</button>
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