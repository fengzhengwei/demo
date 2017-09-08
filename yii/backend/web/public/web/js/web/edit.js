$(document).ready(function(){
	$(":input[name=btn]").click(function(){
		var btn_target = $(this);
		if(btn_target.hasClass('disabled'))
		{
			alert('正在处理,请不要重复点击');
			return;
		}else{
			btn_target.addClass('disabled');
		}
		var nickname = $(":input[name=nickname]").val();
		var email = $(":input[name=email]").val();
		var mobile = $(":input[name=mobile]").val();
		var id = $(":input[name=parId]").val();
		$.ajax({
			type:'post',
			url:'/default/up_user',
			data:{
				nickname:nickname,
				email:email,
				mobile:mobile,
				id:id
			}, 
			dataType:'json',
			success:function(msg){
				btn_target.removeClass('disabled');
				if(msg.code == 200)
				{
					alert(msg.msg);
					window.location.href=window.location.href;
				}else
				{
					alert(msg.msg);
				}
			}
		})
	})
})