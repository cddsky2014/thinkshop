<?php header("content-type:text/html;charset=utf-8");
	$link = mysql_connect("127.0.0.1","root","123456") or die("连接失败");

	mysql_select_db("ts") or die("数据库不存在");
	
	mysql_query("set names utf8");

	$sql = "select * from ctg";
?>