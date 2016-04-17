<?php 
include("../link.php");
include("../upload.php");

//print_r($_POST);

/*
	    [pname] => sadasd
    [p_cid] => 
    [price] => sdsa
    [sprice] => asd
    [desc] => ad
    [addr] => asd

	 [color] => Array
        (
            [0] => #ff0000
            [1] => #3366ff
        )

    [size] => Array
        (
            [0] => l
            [1] => xl
            [2] => xxl
        )

	  [isshow] => 2
    [snums] => 
    [keyword] => 

*/
$pname=$_POST["pname"];
$p_cid=$_POST["p_cid"];
$price=$_POST["price"];
$sprice=$_POST["sprice"];
$desc=$_POST["desc"];
$addr=$_POST["addr"];
$isshow=$_POST["isshow"];
$snums=$_POST["snums"];
$keyword=$_POST["keyword"];

$color = implode(",",$_POST["color"]);
$size = implode(",",$_POST["size"]);

$thumb = upload("thumb","../../upload");
$thumb = $thumb[0];

$pimgs = upload("pimgs","../../upload");
$pimgs = implode(",",$pimgs);

$pubtime=time();

$sql = "insert into product(pname,p_cid,price,sprice,descp,addr,isshow,snums,keyword,color,size,thumb,pimgs,pubtime) values('$pname','$p_cid','$price','$sprice','$desc','$addr','$isshow','$snums','$keyword','$color','$size','$thumb','$pimgs','$pubtime')";

if(mysql_query($sql)==true){
	echo "添加成功<a href='./list.php'>返回</a>";
}else{
	echo "添加失败<a href='./list.php'>返回</a>";
}
?>