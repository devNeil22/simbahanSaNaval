             <h4>Holy Mass Monthly Report</h4>
             <div class="mb-3 mt-3">
                <label for="day" class="form-label">Year:</label>
                <select class="form-select" aria-label="Default select example" id="year1" style="width: 90px;">
                <option selected></option>
                    <?php
                        require_once '../includes/connection.inc.php';
                        $sql = "SELECT DISTINCT year FROM holy_mass";
                        $exe = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($exe) > 0){
                            while($data = mysqli_fetch_assoc($exe)){?>
                                 <option value="<?=$data['year']?>"><?=$data['year']?></option>
                        <?php }
                        }
                    ?>
                </select>
            </div>
            <div class="result" style="height: 90%;"></div>


<script>
    $(document).ready(function(){
        $('#year1').change(function(){
            var year = $('#year1 option:selected').val();
            var form_data = new FormData()
            form_data.append('year', year)
            $.ajax({
                url: '../reports/holy-mass.php',
                type: 'post',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(result){
                    $('.result').html(result )
                }
            })
        })
    })
  
</script>