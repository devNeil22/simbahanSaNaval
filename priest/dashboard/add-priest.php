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
    <title>Diosese of Naval</title>
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
                <li class="list-group-item"><a href="./dashboard.php"><i class="fa-solid fa-briefcase"></i> Transactions</a></li>
                <li class="list-group-item"><a href="./availabilities.php"><i class="fa-solid fa-plus"></i> Availabilities</a></li>
                <li class="list-group-item"><a href="./members.php"><i class="fa-solid fa-users"></i> Members</a></li>
                <li class="list-group-item"><a href="./reports.php"><i class="fa-solid fa-chart-line"></i> Reports</a></li>
                <li class="list-group-item" id="log-out"><a href="#"><i class="fa-solid fa-power-off"></i> Log Out</a></li>
            </ul>
        </div>
        <br>
        <div class="member-add">
            <form action="" method="POST" id="add-member">
                 <center><h3>Add Priest</h3></center>
                <label for="Last Name">Last Name</label>
                <input type="text" name="last" id="last" placeholder="Last Name" class="form-control"><br>
                <label for="Last Name">First Name</label>
                <input type="text" name="last" id="first" placeholder="First Name" class="form-control"><br>
                <label for="Last Name">Email</label>
                <input type="email" name="last" id="email" placeholder="Email" class="form-control"><br>
                <label for="Last Name">Position</label>
                <input type="text" name="last" id="position" placeholder="Position" class="form-control"><br>
                <label for="Last Name">Username</label>
                <input type="text" name="last" id="username" placeholder="Username" class="form-control"><br>
                <div class="mb-3 mt-3">
                    <label for="Date" class="form-label">Choose Profile Picture</label>
                    <input type="file" name="" id="profile"  class="form-control">
                </div>
                <button class="btn btn-primary" id="submit"><i class="fa-solid fa-plus"></i> Add Member</button><br>
                <span style="color: red" class="error-message"></span>
            </form>
        </div>
        
    </div>

    <div class="modal" id="sending">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <div style="border: 2px solid black; padding: 20px;">Proccessing Registration</div>
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
                    <h4 style="margin-left: 5px;">Registration Complete</h4>
                </div>

                </div>
            </div>
            </div>
        </div>     

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/add-priest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>