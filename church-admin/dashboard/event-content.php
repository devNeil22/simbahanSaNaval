<?php
    session_start();
    
    if(!isset($_SESSION['username']) || $_SESSION['loggedin'] !== true){
        header("Location: ../forms/login.php");
        exit;
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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../image/logo.jpg" type="image/x-icon">
    <title>Dioses of Naval</title>
</head>
<body>
    <div class="container-fluid">
        <div class="m-nav">
            <button type="button" class="btn" id="burger"><i class="fa-solid fa-bars"></i></button>
            <div class="logo"><img src="../image/logo.jpg" alt=""></div>
            <ul class="list">
                <li><a href="./dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="#"><i class="fa-solid fa-user"></i> Profile</a></li>
                <li><a href="#"><img src="../image/1602cf278cae5b7.78511636.webp" class="rounded" alt=""></a></li>
            </ul>
        </div>
        <br><br><br>
        <div class="sidebar">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="./dashboard.php"><i class="fa-solid fa-briefcase"></i> Transactions</a></li>
                <li class="list-group-item"><a href="./availabilities.php"><i class="fa-solid fa-plus"></i> Availabilities</a></li>
                <li class="list-group-item"><a href="./members.php"><i class="fa-solid fa-users"></i> Members</a></li>
            </ul>
        </div>
        <br>
        <div class="title">
            <h3><?=$_GET['t']?></h3>
            <center>
                <div class="icons btn">
                    <div class="b">
                        <button class="btn btn-primary" onclick="history.back()"><i class="fa-solid fa-backward"></i></button>
                    </div>
                    <div>
                        <img src="../image/1870127.png" alt="" id="announcment" data-bs-toggle="offcanvas" data-bs-target="#demo">
                        <img src="../image/4963766.png" alt="" id="time">
                        <img src="../image/png-clipart-computer-icons-others-miscellaneous-cross.png" alt="" id="disable" class="rounded-circle">
                    </div>
                </div>
            </center>
        </div>
        <div class="form-content">
            <center><h3>Settings</h3></center>
            <form action="">
                <div class="mb-3 mt-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </form>
        </div>
    </div>

    <div class="offcanvas offcanvas-top" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Announcements</h1>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <form action="" method="POST" id="announcement">
                <input type="hidden" id="username" value="<?=$_SESSION['username']?>">
                <input type="hidden" id="title" value="<?=$_GET['t']?>">
                <div class="mb-3 mt-3">
                    <label for="Comment" class="form-label">Comment:</label>
                    <textarea class="form-control" rows="1" id="comment" name="text"></textarea>
                    <span style="color: red" class="error-message"></span>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
            <br>
            <br>
            <div class="ann">              
            </div>
        </div>
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/announcement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>