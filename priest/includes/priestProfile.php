<?php
            include './connection.inc.php';
            $id = $_POST['id'];
            $sql = "SELECT * FROM priests WHERE priest_id = '$id'";
            $getSql = mysqli_query($connection, $sql);
            if(mysqli_num_rows($getSql) > 0 ){
            while($rows = mysqli_fetch_assoc($getSql)){
                    echo '
                        <br>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">';
                                if($rows['profile_pic'] == ""){
                                    echo '<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">';
                                }else{
                                    echo '<img src="../files/'.$rows['profile_pic'].'" alt="Admin" class="rounded-circle" width="150">';
                                }
                     echo '               <div class="mt-3">
                                    <h4>'.$rows['Last_name'].' '.$rows['First_Name'].'</h4>
                                    <p class="text-secondary mb-1">'.$rows['Position'].'</p>
                                    <p class="text-muted font-size-sm">'.$rows['Address'].'</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['Last_name'].' '.$rows['First_Name'].'
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['email'].'
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['Position'].'
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['Address'].'
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['username'].'
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    '.$rows['password'].'
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    ';
                }
            }else{
                echo 'there was an error'.mysqli_error($connection);
            }
            ?>