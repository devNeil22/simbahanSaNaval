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
                <li><a href="./dashboard.php"><i class="fa-solid fa-house-user"></i> Home</a></li>
                <li><a href="./adminProfile.php"><i class="fa-solid fa-user"></i> Profile</a></li>
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
                <li class="list-group-item"><a href="./priests.php"><i class="fa-solid fa-street-view"></i>  Priest</a></li>
                <li class="report list-group-item" style="background-color: #ffff;" id="report">
                    <a href="#" style="color: black;"><i class="fa-solid fa-chart-line"></i> Reports</a>
                </li>
                 <li class="list-group-item"><a href="./donations.php"><i class="fa-solid fa-money-bill"></i> Donation</a></li>
                <li class="list-group-item" id="log-out"><a href="#"><i class="fa-solid fa-power-off"></i> Log Out</a></li>
            </ul>
        </div>
        <br>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="activities1">
             <select name="month" id="month">
                <option selected value=""></option>
                <option  value="January">January</option>
                <option  value="February">February</option>
                <option  value="March">March</option>
                <option  value="April">April</option>
                <option  value="May">May</option>
                <option  value="June">June</option>
                <option  value="July">July</option>
                <option  value="August">August</option>
                <option  value="September">September</option>
                <option  value="October">October</option>
                <option  value="November">November</option>
                <option  value="December">December</option>
            </select>
            <select name="" id="year">
                <option value="" selected></option>
                <?php
                    $year = date("Y");
                    for($x = $year; $x >= 1998; $x--){ ?>
                        <option value="<?=$x?>"><?=$x?></option>
                <?php   }
                ?>
            </select>
            <br>
            <br>
           <div class="content">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Month</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                 <tbody class="t-body">
                    
                </tbody>
            </table>
           </div>
        </div>
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/report.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


