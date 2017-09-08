$(document).ready(function(){
    $('.redel').click(function(){
        var id = $(this).prev().val();
        var obj = $(this);
        $.ajax({
            type:'post',
            url:'/order/redel',
            dataType:'json',
            data:{
                id:id
            },
            success:function(msg)
            {
                if(msg.code == 200)
                {
                    alert(msg.msg);
                    location.href="/order/index";
                }else{
                    alert(msg.msg);
                }
            }
        })
    })
})