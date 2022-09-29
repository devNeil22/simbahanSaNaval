$(document).ready(function(){

    $('#search').keyup(function(){
        var value = $(this).val();
        //alert(value)

        if(value != ""){
            $.ajax({
                url:"../includes/member-search.php",
                method: "POST",
                data:{search:value},
                success:function(data){
                    $('.fetch-members').html(data)
                }
            })
        }else{
            $.ajax({
                url: '../includes/fetch-members.php',
                type: 'post',
                success: function(res){
                    $('.fetch-users').html(res)
                }
            }) 
        }
    })
})