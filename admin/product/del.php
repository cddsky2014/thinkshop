<?php
include("../link.php");

$pid = $_GET["pid"];

$cur = mysql_fetch_assoc(mysql_query("select thumb,pimgs from product where pid='$pid'"));

$thumb = $cur["thumb"];
unlink("../../upload/$thumb");

$pimgs = explode(",",$cur["pimgs"]);
foreach($pimgs as $v){
	unlink("../../upload/$v");
}


$sql = "delete from product where pid='$pid'";

if(mysql_query($sql)==true){
	echo "删除成功<a href='./list.php'>返回</a>";
}else{
	echo "删除失败<a href='./list.php'>返回</a>";
}

?>