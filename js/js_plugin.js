// JavaScript Document
$(function(){
	$("#usrname").focus();
	$(".btn_login").live('click',function(){
		var user = $("#usrname").val();
		var pass = $("#password").val();
		if(user==""){
			$("#password").val("");
			$('#logindiag').modal({
   				backdrop:true,
    			keyboard:true,
    			show:true
			});
			return false;
		}
		if(pass==""){
			$("#password").focus();
			return false;
		}
		$.ajax({
			type: "POST",
			url: "login.php?action=login",
			dataType: "json",
			data: {"usrname":user,"password":pass},
			beforeSend: function(){
				$("#loginbtn").button('loading');
			},
			success: function(json){
				if(json.success==1){
					$('#login_frame').html('');
					$("#login_frame").load('loginframe.php',{
        				action:"logged"
    				});
    				$.post("diagframe.php",{action:"perinfo"},function(data,status){
    					$("#logindiag").replaceWith(data);
    					$.getScript("../js/js_perinfo.js");
    				});
					}
					else{
					$("#password").val("");
					$('#logindiag').modal({
   						backdrop:true,
    					keyboard:true,
    					show:true
					});
					$("#loginbtn").button('reset');
				}
			}
		});
	});
	//退出动作绑定
	$("#logout").live('click',function(){
		$.post("login.php?action=logout",function(msg){
			if(msg==1){
			    $('#login_frame').html('');
				$("#login_frame").load('loginframe.php',{
        			action:"login"
    			});
    			$.post("diagframe.php",{action:"login"},function(data,status){
    				$("#personinfo").replaceWith(data);
    			});
			}
		});
	});
	//输入提醒
    $('#searchinput').typeahead({
        ajax:{ url: '../typeahead.php',triggerLength: 0}
    });
    //登录检测
    $.post("login.php?action=islogin",function(msg){
		if(msg==1){
			$.getScript("../js/js_perinfo.js");
    	}
    });
});