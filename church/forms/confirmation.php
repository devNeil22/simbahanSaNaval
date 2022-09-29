<?php
    session_start();
?>

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
    <title>Elementary Module</title>
</head>
<body>
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
                        <form action="../includes/confirm.inc.php" method="POST" id="confirm" style="height: 600px;">
                            <h4>Confirmation Code</h4><br>
                            This confrimation code is sent to your email address
                            <input type="hidden" name="id" id="id" value="<?=$_SESSION['id']?>">
                            <input type="text" name="code" id="code" placeholder="Enter Confirmation Code"><br>
                            <span class="register-status" style="color: red;"></span>
                            <button type="submit" id="s-submit">CONFIRM</button><br>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>