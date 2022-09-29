  <?php
     require_once '../includes/connection.inc.php';
    $year = $_POST['year'];

    $sql = "SELECT DISTINCT Month FROM holy_mass WHERE year = '$year' ORDER BY mass_id DESC";
    $exe = mysqli_query($connection, $sql);
  ?>
  
  <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Month', 'Number Who Registered'],
                <?php
                    if($num = mysqli_num_rows($exe) > 0){
                        while($month = mysqli_fetch_assoc($exe)){
                            $getNumMonth = $month['Month'];
                            $sql1 = "SELECT * FROM holy_mass WHERE Month = '$getNumMonth'";
                            $exe1 = mysqli_query($connection, $sql1);
                            $getNum = mysqli_num_rows($exe1);
                            echo "['".$month['Month']."', '".$getNum."'],";
                   }
                    }
                ?>
                ]);

                var options = {
                chart: {
                    title: 'Holy Mass Reservation',
                    subtitle: 'Number of Reservations',
                }
                };

                var chart = new google.charts.Bar(document.getElementById('funeral'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
            </script>

             <div id="funeral" style="height: 80%;"></div>