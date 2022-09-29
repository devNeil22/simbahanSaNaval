$(document).ready(function(){

    $('#search').keyup(function(){
        var value = $(this).val();
        //alert(value)

        if(value != ""){
            $.ajax({
                url:"../includes/search.php",
                method: "POST",
                data:{search:value},
                success:function(data){
                    $('.fetch-users').html(data)
                }
            })
        }else{
            $.ajax({
                url: '../includes/holy-transactions.php',
                type: 'post',
                success: function(res){
                    $('.fetch-users').html(res)
                }
            }) 
        }
    })
})