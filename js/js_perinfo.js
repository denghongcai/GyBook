//鼠标进入移除事件处理
$("#password-control").mouseover(function(){
  $("#password-modify").toggleClass("hide");
});
$("#password-control").mouseout(function(){
  $("#password-modify").toggleClass("hide");
});
$("#nickname-control").mouseover(function(){
  $("#nickname-modify").toggleClass("hide");
});
$("#nickname-control").mouseout(function(){
  $("#nickname-modify").toggleClass("hide");
});
$("#sex-control").mouseover(function(){
  $("#sex-modify").toggleClass("hide");
});
$("#sex-control").mouseout(function(){
  $("#sex-modify").toggleClass("hide");
});
$("#birth-control").mouseover(function(){
  $("#birth-modify").toggleClass("hide");
});
$("#birth-control").mouseout(function(){
  $("#birth-modify").toggleClass("hide");
});
$("#qq-control").mouseover(function(){
  $("#qq-modify").toggleClass("hide");
});
$("#qq-control").mouseout(function(){
  $("#qq-modify").toggleClass("hide");
});
$("#tel-control").mouseover(function(){
  $("#tel-modify").toggleClass("hide");
});
$("#tel-control").mouseout(function(){
  $("#tel-modify").toggleClass("hide");
});
$("#group-control").mouseover(function(){
  $("#group-modify").toggleClass("hide");
});
$("#group-control").mouseout(function(){
  $("#group-modify").toggleClass("hide");
});

//modify button
$("#password-modify").live("click",function(){ 
		$("#input-password").removeAttr("disabled");
});
$("#nickname-modify").live("click",function(){ 
		$("#input-nickname").removeAttr("disabled");
});
$("#sex-modify").live("click",function(){ 
		$("#select-sex").removeAttr("disabled");
});
$("#birth-modify").live("click",function(){ 
		$("#input-birth").removeAttr("disabled");
});
$("#qq-modify").live("click",function(){ 
		$("#input-qq").removeAttr("disabled");
});
$("#tel-modify").live("click",function(){ 
		$("#input-tel").removeAttr("disabled");
});
$("#group-modify").live("click",function(){ 
		$("#select-group").removeAttr("disabled");
});

$("#perinfo_save").live('click',function(){
    var nickname = $("#input-nickname").val();
    var passwd = $("#input-password").val();
    var sex = $("#select-sex").val();
    var qq = $("#input-qq").val();
    var tel = $("#input-tel").val();
    var birth = $("#input-birth").val();
    var group = $("#select-group").val();   
    $.ajax({
      type: "POST",
      url: "login.php?action=perinfomodify",
      dataType: "json",
      data: {"nickname":nickname,"password":passwd,"sex":sex,"qq":qq,"tel":tel,"birth":birth,"group":group},
      beforeSend: function(){
        $("#perinfo_save").button('loading');
      },
      success: function(json){
          if(json.success==1){
            $("#perinfo_save").button('reset');
            $.post("login.php?action=islogin");
          }
      }
    });
});