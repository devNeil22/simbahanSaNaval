$(document).ready(function(){        
        var d = new Date();
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var month = months[d.getMonth()]
        var year = d.getFullYear()

        var select = $('#month option:selected').val(month)
        var getYear = $('#year option:selected').val(year)
        var form_data = new FormData();
        form_data.append('select', month)
        form_data.append('year', year)
        select.html(month)
        getYear.html(year)

         $.ajax({
            url: '../includes/get-report.php',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(res){
                $('.t-body').html(res)
            }
        })

        $('#month').on('change', function(){
            var m = $('#month option:selected').val()
            var y = $('#year option:selected').val()
            var form_data = new FormData();
            form_data.append('select', m)
            form_data.append('year', y)

            $.ajax({
            url: '../includes/change-report.php',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(res){
                $('.t-body').html(res)
             }
            })
        })

        $('#year').on('change', function(){
            var year = $('#year option:selected').val()
            var m = $('#month option:selected').val()
            var form_data = new FormData();
            form_data.append('select', m)
            form_data.append('year', year)
            //alert(year)

            $.ajax({
            url: '../includes/change-report.php',
            type: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(res){
                $('.t-body').html(res)
             }
            })
        })
    })