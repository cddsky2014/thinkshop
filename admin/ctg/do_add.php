<?php
	include("../link.php");
	$cname = $_POST["cname"];
	$pid = $_POST["pid"];

	$sql = "insert into ctg(cname,pid) values('$cname','$pid')";

	if(mysql_query($sql)==true){
		echo "添加成功<a href='./ctg.php'>返回</a>";
	}else{
		echo "添加失败<a href='./ctg.php'>返回</a>";
	}

?>