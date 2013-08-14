<?php
	$host=SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
	$dbuser=SAE_MYSQL_USER;
	$dbpass=SAE_MYSQL_PASS;
	$dbname=SAE_MYSQL_DB;
	$timezone="Asia/Shanghai";
	$mysql=mysql_connect($host,$dbuser,$dbpass) or die("数据库连接失败：".mysql_error());
	mysql_select_db($dbname, $mysql) or die("选定数据库失败：".mysql_error());
	mysql_query("SET names UTF8");
	date_default_timezone_set($timezone);
?>