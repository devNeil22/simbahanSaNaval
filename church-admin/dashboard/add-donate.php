<?php
    require_once '../includes/connection.inc.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM users WHERE u_id = $id";
    $exe = mysqli_query($connection, $sql);
    $name = mysqli_fetch_assoc($exe);
?>

<div class="d-content">
    <form method="post" id="f-donate">
        <h4>Add Donation From</h4>
        <h5><?=$name['Last_name'].' '.$name['First_Name']?></h5>
        <input type="hidden" id="email" value="<?=$name['email']?>">
        <input type="hidden" id="id" value="<?=$id?>">
        <label for="amount">Enter Amount</label>
        <input type="text" class="form-control" id="amount">
        <span style="color: red;" class="erramount"></span>
        <button type="submit" id="d-done" class="btn btn-primary">Done</button>
    </form>
</div>

<script src="../js/add-donate.js"></script>