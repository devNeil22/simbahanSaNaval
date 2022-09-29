
<h4><button class="btn btn-success back"><i class="fa-solid fa-arrow-left"></i></button> Christening Reservations Reports as of <?=$_POST['month'].','.' '.$_POST['year']?></h4>

<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Priest</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
        <tbody class="t-body">
          <?php
            require_once '../includes/connection.inc.php';

            $year = $_POST['year'];
            $month = $_POST['month'];

            $sql = "SELECT * FROM christening JOIN priests ON priests.priest_id = christening.priest_id
                    JOIN users ON users.u_id = christening.u_id WHERE christening.Month = '$month' AND christening.year = $year";
            $exe = mysqli_query($connection, $sql);
            if($rows = mysqli_num_rows($exe) > 0){
                while($get = mysqli_fetch_assoc($exe)){ ?>
                    <tr>
                        <td><?=$get['Last_name'].' '.$get['First_Name']?></td>
                        <td><?=$get['PLast_name'].' '.$get['PFirst_Name']?></td>
                        <td><?=$get['date']?></td>
                        <td><span>&#8369;</span><?=number_format($get['amount'])?></td>
            <?php }
            }else{
                    echo '<h4>No Data</h4>';
                }
          ?>   
           </tr>       
        </tbody>
</table>

<script>
    $(document).ready(function(){
          $('.back').click(function(){
                window.location.reload('../dushboard/reports.php')
            })
    })
</script>
