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
            $sql = "SELECT * FROM priests";
            $exe = mysqli_query($connection, $sql);
            $data = mysqli_fetch_assoc($exe);
        ?>
        <div class="m-nav">
             <button type="button" class="btn" id="burger"><i class="fa-solid fa-bars"></i></button>
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
                    <div>
                        <img src="../image/4963766.png" alt="" id="time1" data-bs-toggle="modal" data-bs-target="#myModal">
                        <img src="../image/png-clipart-computer-icons-others-miscellaneous-cross.png" alt="" id="disable" class="rounded-circle" data-bs-toggle="modal" data-bs-target="#delete-time">
                    </div>
                </div>
            </center>
        </div>
        <div class="form-content">
            <center><h3 class="show">Funeral Time Availabilities</h3></center>
            <div class="mb-3 mt-3" style="margin-left: 10px">
                <select class="form-select" aria-label="Default select example" id="delete-day">
                   <option selected value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wendesday">Wendesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            </div>
            <table class="table table-striped">
            <thead>
            <tr>
                <th>Time</th>
                <th>AM/PM</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="t-time">
                <input type="hidden" value="<?=$_GET['t']?>" id="t-title">
                <input type="hidden" value="<?=$_SESSION['id']?>" id="t-id">
            </tbody>
        </table>
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

    <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADD TIME</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" id="add-time">
            <input type="hidden" id="title" value="<?=$_GET['t']?>">
            <input type="hidden" value="<?=$_SESSION['id']?>" id="id">
            <div class="mb-3 mt-3">
                <label for="time" class="form-label">Time:</label>
                <input type="text" class="form-control" id="time" placeholder="Add time" name="time">
                <span class="error-message1" style="color: red;"></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="time" class="form-label">AM/PM:</label>
                <select class="form-select" aria-label="Default select example" id="zone">
                    <option selected>Open this select menu</option>
                    <option value="PM">PM</option>
                    <option value="AM">AM</option>
                </select>
            </div>
             <div class="mb-3 mt-3">
                <label for="day" class="form-label">Choose Day:</label>
                <select class="form-select" aria-label="Default select example" id="day">
                    <option selected>Open this select menu</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wendesday">Wendesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
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

     <div class="modal fade" id="delete-time">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">DELETE TIME</h4>
        <div class="mb-3 mt-3" style="margin-left: 10px">
                <select class="form-select" aria-label="Default select example" id="delete-day">
                   <option selected>Open this select menu</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Mondy</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wendesday">Wendesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Time</th>
                <th>AM/PM</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="t-time">
                <input type="hidden" value="<?=$_GET['t']?>" id="t-title">
                <input type="hidden" value="<?=$_SESSION['id']?>" id="id">
            </tbody>
        </table>
      </div>


  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/announcement.js"></script>
    <script src="../js/add-time.js"></script>
    <script src="../js/edit-time.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/specificDay-time.js"></script>
    <script src="../js/fetch-users.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>