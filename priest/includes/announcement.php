<?php

    require_once './connection.inc.php';
    $text = $_POST['announcement'];
    $username = $_POST['username'];
    $title = $_POST['title'];

    $sql = "INSERT INTO announcement(text, username, title) VALUES('$text', '$username', '$title')";
    $exe = mysqli_query($connection, $sql);

    if(!$exe){
        echo '
            <script>alert('.mysqli_error($connection).')</script>
        ';
    }

    $select = "SELECT * FROM announcement  WHERE title = '$title' ORDER BY a_id DESC";
    $command = mysqli_query($connection, $select);
    if(mysqli_num_rows($command) > 0){
        while($data = mysqli_fetch_assoc($command)){
            echo '
                <hr>
                <p style="color: blue;">'.$data['username'].'</p>
                <p>'.nl2br($data['text']).'</p>
                <span><a href="#"><i class="fa-solid fa-pen"></i> Edit</a> <a href="#"><i class="fa-solid fa-trash"> </i> Delete</a></span>
                <hr>
            ';
        }
    }