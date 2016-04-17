<?php 
	include("../link.php");

	$res = mysql_query($sql);

	$ctg_arr = array();
	while($row = mysql_fetch_assoc($res)){ 
		$ctg_arr[] = $row;
	}

	//无限分类
	function unlimit_class($cates,$pid=0,$level=0){
		static $classes = array();
		// 让数据在递归中保持上次得到的结果
		foreach($cates as $vo){
			if($pid== $vo['pid']){
				$vo["level"]=$level;
				$classes[]=$vo;
				unlimit_class($cates,$vo['cid'],$level+1);
			}
		}
		return $classes;
	}
	
	$ctg_arr = unlimit_class($ctg_arr);

	
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<a href="./add.php">添加</a>

<table border=1>
	<tr>
		<td>分类名</td>
		<td>操作</td>
	</tr>
	<?php foreach($ctg_arr as $v){ ?>
	<tr>
		<td><?php echo str_repeat("-",$v["level"]).$v["cname"];?></td>
		<td>
			<a href="./del.php?cid=<?php echo $v["cid"];?>">删除</a>
			<a href="./edit.php?cid=<?php echo $v["cid"];?>">修改</a>
		</td>
	</tr>
	<?php }?>

</table>
	
</body>
</html>