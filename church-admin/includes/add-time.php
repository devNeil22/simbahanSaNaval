<?php
    require_once './connection.inc.php';

    $time = $_POST['time'];
    $zone = $_POST['zone'];
    $title = $_POST['title'];
    $day = $_POST['day'];

    $sql = "INSERT INTO time(Title, Time, timeZone, day) VALUES('$title', '$time', '$zone', '$day')";
    $exe = mysqli_query($connection, $sql);

    if(!$exe){
        echo '
            <script>alert('.mysqli_error($connection).')</script>
        ';
    }

    /*$select = "SELECT * FROM time  where title = '$title'";
    $command = mysqli_query($connection, $select);
    if(mysqli_num_rows($command) > 0){
        while($data = mysqli_fetch_assoc($command)){
            echo '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        '.$data['Time'].' '.$data['timeZone'].'
                    </label>
                </div>
            ';
        }
    }*/