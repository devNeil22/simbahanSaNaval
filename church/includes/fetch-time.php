<?php
    require_once './connection.inc.php';
    $title = $_POST['title'];
    $day = $_POST['day'];
    $id = $_POST['priest_id'];

    $select = "SELECT * FROM time where Title = '$title' AND day = '$day' AND priest_id = '$id'";
    $command = mysqli_query($connection, $select);
    if(mysqli_num_rows($command) > 0){
        while($data = mysqli_fetch_assoc($command)){
            echo '
                 <div class="border">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="checkRadio" value="'.$data['Time'].' '.$data['timeZone'].'">
                            <label class="form-check-label" for="flexRadioDefault1">
                                '.$data['Time'].' '.$data['timeZone'].'
                            </label>
                    </div>
                </div>
            ';
        }
    }else{
        echo 'No time for this day yet';
    }