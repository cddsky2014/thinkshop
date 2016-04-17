<?php
include("../link.php");
include("../upload.php");

print_r($_POST);
$pid = $_POST["pid"];
$pname=$_POST["pname"];
$p_cid=$_POST["p_cid"];
$price=$_POST["price"];
$sprice=$_POST["sprice"];
$descp=$_POST["descp"];
$addr=$_POST["addr"];
$isshow=$_POST["isshow"];
$snums=$_POST["snums"];
$keyword=$_POST["keyword"];

$color = implode(",",$_POST["color"]);
$size = implode(",",$_POST["size"]);

$thumb = upload("thumb","../../upload");


$pimgs = upload("pimgs","../../upload");
$pimgs = implode(",",$pimgs);


$sql = "update product set pname='$pname',p_cid='$p_cid',price='$price',sprice='$sprice',descp='$descp',addr='$addr',isshow='$isshow',snums='$snums',keyword='$keyword',color='$color',size='$size'";

//thumb='$thumb',pimgs='$pimgs' where pid='$pid'";

if(empty($thumb)==false){
	$thumb = $thumb[0];
	$sql = $sql.",thumb='$thumb'";
}

if(empty($pimgs)==false){
	$sql = $sql.",pimgs='$pimgs'";
}

$sql = $sql." where pid='$pid'";


if(mysql_query($sql)==true){
	echo "修改成功<a href='./list.php'>返回</a>";
}else{
	echo "修改失败<a href='./list.php'>返回</a>";
}
?>