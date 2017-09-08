$(document).ready(function(){
	$('#save').click(function(){
		var btn_target = $(this);
		if(btn_target.hasClass('disabled'))
		{
			alert('正在处理,请不要重复点击');
			return;
		}else{
			btn_target.addClass('disabled');
		}
		var old_password = $("#old_password").val();
		var new_password = $("#new_password").val();
		$.ajax({
			type:'post',
			url:'/default/up_pwd',
			data:{
				old_password:old_password,
				new_password:new_password,
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