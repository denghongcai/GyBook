<?php
	header('Content-type: application/json');
	require("conn.php");
	$query = mysql_query("select * from bookinfo");
	$books = array();
	for($i=1;$row=mysql_fetch_array($query);$i++) {
		$books[] = array("id"=>$i,"name"=>$row['name']);
		if(i == 8) break;
	}
	echo json_encode($books);
?>
