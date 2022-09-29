

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">
    <title>Diocese of Naval</title>
</head>
<body>
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        Processing.....
      </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>

 <div class="modal" id="success">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal body -->
      <div class="modal-body">
        <div class="success-m"><h5><i class="fa-solid fa-check" style="color: green;"></i> Confirmation sent to your email address</h5></div>
      </div>

      <!-- Modal footer -->

    </div>
  </div>
</div>
    <div class="m-container">
        <div class="m-nav">
                    <ul m-nav-list>
                        <div><li class="items"><a href="../index.php">About</a></li></div>
                        <li class="items"><a href="../index.php">Contact</a></li>
                        <li class="items"><a href="./login.php">LogIn</a></li>
                        <li class="items"><a href="./register.php">Register</a></li>
                    </ul>
                </div><br><br>
        <div class="m-content">
                <div class="contents">
                    <div class="text-1"><h3 style="font-family: 'Hurricane', cursive;">Prayer is the opening of the heart to God as to Friend</h3></div>
                </div>
                <div class="m-form">
                    <div class="form-content">
                        <form action="" method="POST" id="register" style="height: 600px;">
                            <h4>REGISTER TO THE SYSTEM</h4>
                            <input type="text" name="last" id="last" placeholder="Last Name">
                            <span class="errlast" style="color: red;"></span>
                            <br>
                            <input type="text" name="first" id="first" placeholder="First Name">
                            <span class="errfirst" style="color: red;"></span>
                            <br>
                            <input type="text" name="username" id="username" placeholder="Username">
                            <span class="errusername" style="color: red;"></span>
                            <br>
                            <input type="email" name="email" id="email" placeholder="Email" class="email">
                            <p class="erremail" style="color: red;"></p>
                            <input type="text" name="address" id="address" placeholder="Address">
                            <span class="erradd" style="color: red;"></span>
                            <br>
                            <input type="password" name="password" id="password" placeholder="Create Password">
                            <span class="errpass" style="color: red;"></span>
                            <br>
                            <input type="password" name="c-password" id="c-password" placeholder="Confirm Password">
                            <p class="errconfirm" style="color: red;"></p>
                            <button type="submit" id="r-submit">Input valid information</button><br>
                            <span class="register-status" style="color: red;"></span>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="../js/check-username.js"></script>
    <script src="../js/checkEmail.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>