<?php
    require_once './connection.inc.php';

    $m = $_POST['select'];
?>

<tr>
    <td>Holy Mass Reservations</td>
    <td>
        <?php
            require_once './connection.inc.php';
            $m = $_POST['select'];
            $y = $_POST['year'];
            $sql1 = "SELECT SUM(amount) AS sum FROM holy_mass WHERE Month = '$m' AND year = $y AND status = 1";
            $exe1 = mysqli_query($connection, $sql1);

            $sql2 = "SELECT Month FROM holy_mass WHERE Month = '$m'";
            $exe2 = mysqli_query($connection, $sql2);
            $get2 = mysqli_fetch_assoc($exe2)
            
        ?>
        <?=$get2['Month']?>
    </td>
    <td>
        <?php
            while( $get1 = mysqli_fetch_assoc($exe1)){
                echo "<span>&#8369;</span>".number_format($get1['sum']);
            }
        ?>
    </td>
    <td><button class="btn btn-primary" id="holy-mass">View</button></td>
</tr>

<tr>
    <td>Wedding Reservations</td>
    <td>
        <?php
            require_once './connection.inc.php';
            $m = $_POST['select'];
            $y = $_POST['year'];
            $sql1 = "SELECT SUM(amount) AS sum FROM wedding WHERE Month = '$m' AND year = $y AND status = 1";
            $exe1 = mysqli_query($connection, $sql1);

            $sql2 = "SELECT Month FROM wedding WHERE Month = '$m'";
            $exe2 = mysqli_query($connection, $sql2);
            $get2 = mysqli_fetch_assoc($exe2)
            
        ?>
        <?=$get2['Month']?>
    </td>
    <td>
       <?php
            while( $get1 = mysqli_fetch_assoc($exe1)){
                echo "<span>&#8369;</span>".number_format($get1['sum']);
            }
        ?>
    </td>
    <td><button class="btn btn-primary" id="wedding">View</button></td>
</tr>
</tr>

<tr>
    <td>Funeral Reservations</td>
    <td>
        <?php
            require_once './connection.inc.php';
            $m = $_POST['select'];
            $y = $_POST['year'];
            $sql1 = "SELECT SUM(amount) AS sum FROM funeral WHERE Month = '$m' AND year = $y AND status = 1";
            $exe1 = mysqli_query($connection, $sql1);

            $sql2 = "SELECT Month FROM funeral WHERE Month = '$m'";
            $exe2 = mysqli_query($connection, $sql2);
            $get2 = mysqli_fetch_assoc($exe2)
            
        ?>
        <?=$get2['Month']?>
    </td>
    <td>
       <?php
            while( $get1 = mysqli_fetch_assoc($exe1)){
                echo "<span>&#8369;</span>".number_format($get1['sum']);
            }
        ?>
    </td>
    <td><button class="btn btn-primary" id="funeral">View</button></td>
</tr>
</tr>

<tr>
    <td>Christening Reservations</td>
    <td>
        <?php
            require_once './connection.inc.php';
            $m = $_POST['select'];
            $y = $_POST['year'];
            $sql1 = "SELECT SUM(amount) AS sum FROM christening WHERE Month = '$m' AND year = $y AND status = 1";
            $exe1 = mysqli_query($connection, $sql1);

            $sql2 = "SELECT Month FROM christening WHERE Month = '$m'";
            $exe2 = mysqli_query($connection, $sql2);
            $get2 = mysqli_fetch_assoc($exe2)
            
        ?>
        <?=$get2['Month']?>
    </td>
    <td>
        <?php
            while( $get1 = mysqli_fetch_assoc($exe1)){
                echo "<span>&#8369;</span>".number_format($get1['sum']);
            }
        ?>
    </td>
    <td><button class="btn btn-primary" id="christening">View</button></td>
</tr>
</tr>

<tr>
    <td>Donation</td>
    <td>
        <?php
            require_once './connection.inc.php';
            $m = $_POST['select'];
            $sql1 = "SELECT SUM(amount) AS sum FROM donation WHERE month = '$m'";
            $exe1 = mysqli_query($connection, $sql1);

            $sql2 = "SELECT month FROM donation WHERE month = '$m'";
            $exe2 = mysqli_query($connection, $sql2);
            $get2 = mysqli_fetch_assoc($exe2)
            
        ?>
        <?=$get2['month']?>
    </td>
    <td>
        <?php
            while( $get1 = mysqli_fetch_assoc($exe1)){
                echo "<span>&#8369;</span>".number_format($get1['sum']);
            }
        ?>
    </td>
    <td><button class="btn btn-primary" id="donation">View</button></td>
</tr>

<script>
    $(document).ready(function(){
        var month = "<?=$m?>"
        var year = "<?=$y?>"
        var form_data = new FormData();
        form_data.append('month', month)
        form_data.append('year', year)

        $('#holy-mass').click(function(){
            $.ajax({
                url: '../reports/holy-mass.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    $('.content').html(res)
                }
            })
        })

        $('#wedding').click(function(){
            $.ajax({
                url: '../reports/wedding.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    $('.content').html(res)
                }
            })
        })

        $('#funeral').click(function(){
            $.ajax({
                url: '../reports/funeral.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    $('.content').html(res)
                }
            })
        })

        $('#christening').click(function(){
            $.ajax({
                url: '../reports/chris.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    $('.content').html(res)
                }
            })
        })

        $('#donation').click(function(){
            $.ajax({
                url: '../reports/donation.php',
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res){
                    $('.content').html(res)
                }
            })
        })
    })
</script>