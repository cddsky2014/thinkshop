<?php
include("../link.php");

$sql = "select * from product";

$res = mysql_query($sql);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
</head>
<body>
<a href="./add.php">添加</a>
	<table border=1>
		<tr>
			<td>商品名称</td>
			<td>分类</td>
			<td>标题图片</td>
			<td>描述图片</td>
			<td>原价</td>
			<td>优惠价</td>
			<td>颜色</td>
			<td>尺寸</td>
			<td>产地</td>
			<td>库存</td>
			<td>关键字</td>
			<td>是否显示</td>
			<td>操作</td>
		</tr>
		<?php while($row=mysql_fetch_assoc($res)){?>
		<tr>
			<td><?php echo $row["pname"];?></td>
			<td><?php 
				$cid = $row["p_cid"];
			    $row2 = mysql_fetch_assoc(mysql_query("select cname from ctg where cid=$cid"));

				echo $row2["cname"];
			
			?></td>
			<td><img width="80px" src="../../upload/<?php echo $row["thumb"];?>" alt=""></td>
			<td><?php 
				$imgs = explode(",",$row["pimgs"]);

				foreach($imgs as $v){
					echo "<img width=80 src='../../upload/$v'>";
				}			
			
			?></td>
			<td><?php echo $row["price"];?></td>
			<td><?php echo $row["sprice"];?></td>
			<td><?php 
				$colors = explode(",",$row["color"]);
				foreach($colors as $v){
					echo "<font color='$v' size='5'>●</font>";
				}	
			?></td>
			<td><?php echo $row["size"];?></td>
			<td><?php echo $row["addr"];?></td>
			<td><?php echo $row["snums"];?></td>
			<td><?php echo $row["keyword"];?></td>
			<td><?php 
				if($row["isshow"]==1){
					echo "显示";
				}else{
					echo "不显示";
				}
			
			?></td>
			
			<td>
			<a href="./del.php?pid=<?php echo $row["pid"];?>">删除</a> 
			<a href="./edit.php?pid=<?php echo $row["pid"];?>">修改</a>
			</td>
		</tr>
		<?php }?>

	</table>
	
</body>
</html>