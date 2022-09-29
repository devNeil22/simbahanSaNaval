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
    <title>Dioses of Naval</title>
</head>
<body>
    <div class="modal" id="sending">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <!-- Modal body -->
                <div class="modal-body">
                    <div style="border: 2px solid black; padding: 20px;">Proccessing.....</div>
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
                    <h4 style="margin-left: 5px;">Confirmation Success!</h4>
                </div>

                </div>
            </div>
            </div>
        </div>

         <div class="modal" id="cancel">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body" style="display: flex; align-items: center">
                    <div style="width: 100px; padding: 20px; border: 2px solid black; border-radius: 100%;">
                        <center><h1 style="color:red;"><i class="fa-solid fa-ban"></i> </h1></center>
                    </div>
                    <h4 style="margin-left: 5px;">Reservation Cancelled</h4>
                </div>

                </div>
            </div>
            </div>
        </div>

        <div class="modal" id="users">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Choose Members</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                 <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody class="display-users">
                        <input type="hidden" id="title" value="<?=$_GET['t']?>">
                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>

    <div class="container-fluid">
        <?php
            require_once '../includes/connection.inc.php';
            $sql = "SELECT * FROM admin";
            $exe = mysqli_query($connection, $sql);
            $data = mysqli_fetch_assoc($exe);
        ?>
        <div class="m-nav">
            <button type="button" class="btn" id="burger"><i class="fa-solid fa-bars"></i></button>
            <div class="logo"><img src="../image/logo.jpg" alt=""></div>
            <ul class="list">
                <li><a href="../dashboard/dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
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
                <li class="list-group-item"><a href="../dashboard/members.php"><i class="fa-solid fa-users"></i> Members</a></li>
                <li class="list-group-item"><a href="../dashboard/priests.php"><i class="fa-solid fa-street-view"></i>  Priest</a></li>
                <li class="list-group-item"><a href="../dashboard/reports.php"><i class="fa-solid fa-chart-line"></i> Reports</a></li>
                 <li class="list-group-item"><a href="../dashboard/donations.php"><i class="fa-solid fa-money-bill"></i> Donation</a></li>
                <li class="list-group-item" id="log-out"><a href="#"><i class="fa-solid fa-power-off"></i> Log Out</a></li>
            </ul>
        </div>
        <br>
        <div class="activities1">
            <h4>Holy Mass Reservations</h4>
            <div class="search">
                <form action="" method="post" id="form-search">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Reservation Date</th>
                     <th scope="col">Time</th>
                     <th scope="col">Remark</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="fetch-users">
                    
                </tbody>
        </div>
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/h-transactions.js"></script>
    <script src="../js/fetch-users.js"></script>
    <script src="../js/search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>