<?php
session_start();
require_once ('conn.php');

$action = $_GET['action'];
if ($action == 'login') {
	$user = stripslashes(trim($_POST['usrname']));
	$pass = stripslashes(trim($_POST['password']));
	if (empty ($user)) {
		echo '用户名不能为空';
		exit;
	}
	if (empty ($pass)) {
		echo '密码不能为空';
		exit;
	}
	$sha1pass = sha1($pass);
	$query = mysql_query("select * from user where usrname='$user'");

	$us = is_array($row = mysql_fetch_array($query));

	$ps = $us ? $sha1pass == $row['passwd'] : FALSE;
	if ($ps) {
		$_SESSION['usrname'] = $row['usrname'];
		$_SESSION['nickname'] = $row['nickname'];	
		$_SESSION['sex'] = $row['sex'];
		$_SESSION['qq'] = $row['qq'];
		$_SESSION['tel'] = $row['tel'];
		$_SESSION['birth'] = $row['birth'];
		$_SESSION['group'] = $row['group'];
		$_SESSION['information'] = $row['information'];
		$arr['success'] = 1;
		$arr['msg'] = '登录成功！';
		$arr['user'] = $_SESSION['nickname'];
	} else {
		$arr['success'] = 0;
	   	$arr['msg'] = '用户名或密码错误！';
	}
	echo json_encode($arr);
}
elseif($action == 'islogin') {
	if($_SESSION['usrname']){
		$user = $_SESSION['usrname'];
		$query = mysql_query("select * from user where usrname='$user'");
		$row = mysql_fetch_array($query);
		$_SESSION['nickname'] = $row['nickname'];	
		$_SESSION['sex'] = $row['sex'];
		$_SESSION['qq'] = $row['qq'];
		$_SESSION['tel'] = $row['tel'];
		$_SESSION['birth'] = $row['birth'];
		$_SESSION['group'] = $row['group'];
		echo '1';
	}
	else
		echo '0';
}
elseif ($action == 'logout') {  //退出
	unset($_SESSION);
	session_destroy();
	echo '1';
}
elseif($action == 'perinfomodify') {
	if($_SESSION['usrname'])
	{
		$user = $_SESSION['usrname'];
		$pass = sha1(stripslashes(trim($_POST['password'])));
		$nickname = stripslashes(trim($_POST['nickname']));
		$sex = stripslashes(trim($_POST['sex']));
		$qq = stripslashes(trim($_POST['qq']));
		$tel = stripslashes(trim($_POST['tel']));
		if($_POST['birth'])	$birth = date("Y-m-d",stripslashes(trim($_POST['birth'])));
		$group = stripslashes(trim($_POST['group']));
		if($_POST['password'])	mysql_query("update user set passwd='$pass' where usrname='$user'");
		if($_POST['nickname'])	mysql_query("update user set nickname='$nickname' where usrname='$user'");
		if($_POST['sex'])	mysql_query("update user set sex='$sex' where usrname='$user'");
		if($_POST['qq'])	mysql_query("update user set qq='$qq' where usrname='$user'");
		if($_POST['tel'])	mysql_query("update user set tel='$tel' where usrname='$user'");
		if($_POST['birth'])	mysql_query("update user set birth='$birth' where usrname='$user'");
		if($_POST['group'])	mysql_query("update user set group='$group' where usrname='$user'");
		$arr['success'] = 1;
		echo json_encode($arr);
	}	
}
?>
