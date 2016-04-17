<?php
	include("../link.php");

	$cid = $_GET["cid"];

	if(mysql_num_rows(mysql_query("select * from ctg where pid='$cid'"))>0){
		echo "请先删除此分类下的子分类<a href='./ctg.php'>返回</a>";
		exit();
	}

	$sql = "delete from ctg where cid='$cid'";

	if(mysql_query($sql)==true){
		echo "删除成功<a href='./ctg.php'>返回</a>";
	}else{
		echo "删除失败<a href='./ctg.php'>返回</a>";
	}

?>