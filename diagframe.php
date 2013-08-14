<?php
	session_start();
	if(!$_SESSION['usrname']&&$_POST['action'] == 'login')
		selector_diag(1);
	else {
		if($_SESSION['usrname']&&$_POST['action'] == 'perinfo')
			selector_diag(2);
	}
	function selector_diag($tmp) {
		switch($tmp) {
			case 1:{
				echo '
<div class="modal hide fade" id="logindiag">
  	<div class="modal-header">
   	 	<a class="close" data-dismiss="modal">×</a>
    	<h3>登陆失败</h3>
  	</div>
  	<div class="modal-body">
    	<p>请检查你的用户名密码是否正确</p>
  	</div>
  	<div class="modal-footer">
    	<a href="#" class="btn btn-warning" data-dismiss="modal">关闭</a>
  	</div>
</div>';
				break;
			}
			case 2:{
				echo '
<div class="modal hide fade" id="personinfo">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>个人信息</h3>
	</div>
	<div class="modal-body">
	<div class="form-horizontal">
		<fieldset>
			<div class="control-group success">
      			<label class="control-label">登录名</label>
      			<div class="controls">
        			<span class="input-xlarge uneditable-input span3">'.$_SESSION['usrname'].'</span>
      			</div>
    		</div>
    		<div class="control-group warning">
      			<label class="control-label">密码</label>
      			<div id="password-control" class="controls">
        			<input type="password" class="input-xlarge span3" id="input-password" disabled placeholder="*********">
        			<a id="password-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
      			</div>
    		</div>
    		<div class="control-group">
      			<label class="control-label" for="input-nickname">姓名</label>
      			<div id="nickname-control" class="controls">
        			<input type="text" class="input-xlarge span2" id="input-nickname" disabled placeholder="'.$_SESSION['nickname'].'">
        			<a id="nickname-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
      			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label" for="select-sex">性别</label>
    			<div id="sex-control" class="controls">
    				<select class="span1" id="select-sex" placeholder="'.$_SESSION['sex'].'" disabled>
                		<option>男</option>
                		<option>女</option>
                		<option>未知</option>
              		</select>
              		<a id="sex-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
              	</div>
            </div>
                <div class="control-group">
      			<label class="control-label" for="input-birth">生日</label>
      			<div id="birth-control" class="controls">
        			<input type="text" class="input-xlarge" id="input-birth" disabled placeholder="'.$_SESSION['birth'].'">
        			<a id="birth-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
      			</div>
    		</div>
    		    <div class="control-group">
      			<label class="control-label" for="input-qq">QQ</label>
      			<div id="qq-control" class="controls">
        			<input type="text" class="input-xlarge" id="input-qq" disabled placeholder="'.$_SESSION['qq'].'">
        			<a id="qq-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
      			</div>
    		</div>
    		<div class="control-group">
      			<label class="control-label" for="input-tel">电话</label>
      			<div id="tel-control" class="controls">
        			<input type="text" class="input-xlarge" id="input-tel" disabled placeholder="'.$_SESSION['tel'].'">
        			<a id="tel-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
      			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label" for="select-group">组别</label>
    			<div id="group-control" class="controls">
    				<select class="span2" id="select-group" disabled>
                		<option>程序组</option>
                		<option>美工组</option>
                		<option>PM组</option>
                		<option>酱油组</option>
              		</select>
              		<a id="group-modify" class="hide" href="#"><i class="icon-pencil"></i></a>
              	</div>
            </div>
    	</fieldset>
    </div>
	</div>
	<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">关闭</a><button type="submit" id="perinfo_save" class="btn btn-primary" data-loading-text="loading...">保存更改</button></div></div>';
				break;
			}
		}
	}
?>