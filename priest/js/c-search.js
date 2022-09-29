$(document).ready(function(){

    $('#search').keyup(function(){
        var value = $(this).val();
        //alert(value)

        if(value != ""){
            $.ajax({
                url:"../includes/c-search.php",
                method: "POST",
                data:{search:value},
                success:function(data){
                    $('.fetch-users').html(data)
                }
            })
        }else{
            $.ajax({
                url: '../includes/chr-transactions.php',
                type: 'post',
                success: function(res){
                    $('.fetch-users').html(res)
                }
            }) 
        }
    })
})