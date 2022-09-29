<?php
    require_once './connection.inc.php';
    $title = $_POST['title'];

    $select = "SELECT * FROM announcement  where title = '$title' ORDER BY a_id DESC";
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