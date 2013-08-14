<?php
	session_start();
	if($_SESSION["usrname"]&&$_POST['action'] == 'logged')
    {
        selector_login(1);
    }
        else
	{
		if(!$_SESSION["usrname"]&&$_POST['action'] == 'login')
		{
			selector_login(2);
      	}
    }
      	function selector_login($tmp) {
      		switch($tmp) {
      			case 1:{
      				echo '<div id="logined_menu" class="btn-group pull-right" style="font-family: 黑体">';
          			echo '<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i>'.$_SESSION['nickname'].'</a>';
         			echo '<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          				<ul class="dropdown-menu">
            					<li><a data-toggle="modal" href="#personinfo"><i class="icon-pencil"></i> 个人信息</a></li>
            					<li><a href="#"><i class="icon-book"></i> 借书管理</a></li>
            					<li class="divider"></li>
            					<li><a id="logout" href="#"><i class="i icon-ban-circle"></i> 退出</a></li>
          				</ul>
          				</div>';
          			break;
      			}
				case 2:{
					echo '<div id="login_form" class="navbar-form pull-right">
         				<input type="email" class="span2" name="usrname" id="usrname" placeholder="用户名" data-target="tooltip" title="请输入用户名" data-placement="bottom"/>
          				<input type="password" class="span2" name="password" id="password" placeholder="密码" data-target="tooltip" title="请输入密码" data-placement="bottom" onkeydown="return SubmitKeyClick(this,event)"/>
              			<button id="loginbtn" type="submit" class="btn  btn_login" data-loading-text="loading...">
              				登录
              			</button>
      					</div>';
      				break;
				}      		
			}
      	}
?>
