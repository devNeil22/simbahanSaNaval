<?php
                require_once './connection.inc.php';
                $title = $_POST['title'];
                $day = $_POST['day'];
                $select = "SELECT * FROM time  where Title = '$title'AND day = '$day' ORDER BY t_id DESC";
                $command = mysqli_query($connection, $select);
                if(mysqli_num_rows($command) > 0){
                    while($data = mysqli_fetch_assoc($command)){?>
                      <tr>
                          <form method="POST">
                            <td>
                                <input type="hidden" value="<?=$_GET['t']?>" id="t-title">
                                <input type="text" class="form-control" id="d-time" name="d-time" value="<?=$data['Time']?>" data-time="<?=$data['Time']?>">
                            </td>
                            <td>
                                <select class="form-select" aria-label="Default select example" id="d-zone">
                                    <option selected><?=$data['timeZone']?></option>
                                    <option value="PM">PM</option>
                                    <option value="PM">AM</option>
                                </select>
                            </td>
                            <td id="action">
                                <button id="t-delete" class="delete btn btn-warning" data-id="<?=$data['t_id']?>"><i class="fa-solid fa-trash"></i></button> 
                            </td>  
                         </form>
                    </tr>  
            <?php   }
                }
            ?>

<script>
    $(document).ready(function(){

        $('.delete').click(function(){
            var t_id = $(this).data('id')
            var title = $('#t-title').val();
             $.ajax({
                url: '../includes/deleteTime.php',
                type: 'post',
                data: {t_id: t_id, title: title},
                success: function(res1){
                   alert(res1)
                   window.location.reload('holy-mass.php');
                }
            })
        })
    })
</script>
