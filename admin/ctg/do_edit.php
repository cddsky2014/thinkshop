<?php
	include("../link.php");

	$cid = $_POST["cid"];
	$cname = $_POST["cname"];
	$pid = $_POST["pid"];

	$sql = "update ctg set pid='$pid',cname='$cname' where cid='$cid'";
	if(mysql_query($sql)==true){
		echo "修改成功<a href='./ctg.php'>返回</a>";
	}else{
		echo "修改失败<a href='./ctg.php'>返回</a>";
	}

	

?>