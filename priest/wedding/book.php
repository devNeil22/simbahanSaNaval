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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css" integrity="sha512-9h7XRlUeUwcHUf9bNiWSTO9ovOWFELxTlViP801e5BbwNJ5ir9ua6L20tEroWZdm+HFBAWBLx2qH4l4QHHlRyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/theme.min.css" integrity="sha512-adRIgePtMQgAVB+Mfkhl+Nyva/WllWlFzJyyhYCjznU3Di+Z4SsYi1Rqsep11PYLpUsW/SjE4NXUkIjabQJCOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="../image/logo.jpg" type="image/x-icon">
    <title>Dioses of Naval</title>
</head>
<body>
    <div class="container-fluid">
        <?php
            require_once '../includes/connection.inc.php';
            $sql = "SELECT * FROM admin";
            $exe = mysqli_query($connection, $sql);
            $data = mysqli_fetch_assoc($exe);
        ?>
        <div class="m-nav">
            <div class="logo"><img src="../image/logo.jpg" alt=""></div>
            <ul class="list">
                <li><a href="./dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="../dashboard/adminProfile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
                <li><a href="#"><img src="../files/<?=$data['profile_pic']?>" class="rounded" alt=""></a></li>
            </ul>
        </div>
        <br><br><br>
         <div class="sidebar">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> <center><img src="../files/<?=$data['profile_pic']?>" alt="" height="60px" width="60px"></center></li>
                <li class="list-group-item"><a href="../dashboard/dashboard.php"><i class="fa-solid fa-briefcase"></i> Transactions</a></li>
                <li class="list-group-item"><a href="../dashboard/availabilities.php"><i class="fa-solid fa-plus"></i> Availabilities</a></li>
                <li class="list-group-item" id="log-out"><a href="#"><i class="fa-solid fa-power-off"></i> Log Out</a></li>
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
                </div>
            </center>
        </div>
        <div class="form-content">
            <form action="" method="post" class="wedding-book">
                 <?php
                        require_once '../includes/connection.inc.php';
                        $u_id = $_GET['id'];
                        $sql = "SELECT * FROM users WHERE u_id = $u_id";
                        $execute = mysqli_query($connection, $sql);
                        $name = mysqli_fetch_assoc($execute);
                    ?>
                    <input type="hidden" id="email" value="<?=$name['email']?>">
                    <input type="hidden" id="myName" value="<?=$name['Last_name'].' '. $name['First_Name']?>">
                    <input type="hidden" id="title" value="<?=$_GET['t']?>">
                    <input type="hidden" id="id" value="<?=$_GET['id']?>">
                <div class="mb-3 mt-3">
                    <input type="hidden" id="title" value="<?=$_GET['t']?>">
                    <label for="Date" class="form-label">Input Date:</label>
                    <input type="text" name="" id="d-bday" autocomplete="off" class="form-control" placeholder="yyyy-mm-dd">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="time"></div>
                 <div class="mb-3 mt-3">
                    <label for="Message" class="form-label">Message(Optional):</label>
                    <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Name of Groom:</label>
                    <input type="text" name="" id="nameGroom" class="form-control" placeholder="Name of Groom">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Upload Groom Birth Certificate</label>
                    <input type="file" name="" id="bg-certificate"  class="form-control">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Name of Bride:</label>
                    <input type="text" name="" id="nameBride" class="form-control" placeholder="Name of Bride">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Upload Brides Birth Certificate</label>
                    <input type="file" name="" id="bb-certificate"  class="form-control">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Upload Your CENOMAR</label>
                    <input type="file" name="" id="cenomar"  class="form-control">
                    <span style="color: red" class="error-message"></span>
                </div>
                 <button type="submit" class="btn btn-primary">Book</button><br>
                 <span id="errorMessage" style="color: red;"></span>
            </form>
        </div>
    </div>

    <div class="modal" id="sending">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <div style="border: 2px solid black; padding: 20px;">Proccessing Reservation</div>
                </div>

                <!-- Modal footer -->

                </div>
            </div>
        </div>

        <div class="modal" id="success">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body" style="display: flex; align-items: center">
                    <div style="width: 100px; padding: 20px; border: 2px solid black; border-radius: 100%;">
                        <center><h1 style="color:green;"><i class="fa-solid fa-check"></i> </h1></center>
                    </div>
                    <h4 style="margin-left: 5px;">Reservation Success!</h4>
                </div>

                </div>
            </div>
            </div>
        </div>


  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/announcement.js"></script>
    <script src="../js/add-time.js"></script>
    <script src="../js/edit-time.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/specificDay-time.js"></script>
    <script src="../js/funeral.js"></script>
    <script src="../js/fetch-users.js"></script>
    <script src="../js/wedding-booking.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>