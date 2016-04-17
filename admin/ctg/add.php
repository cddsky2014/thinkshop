<?php
	include("../link.php");
	$sql = "select * from ctg";
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
	<title>添加</title>
</head>
<body>
	<h1>添加分类</h1>
	<form action="./do_add.php" method="post">
		<table>
			<tr>
				<td>上级分类</td>
				<td>
					<select name="pid">
						<option value="0">顶级分类</option>
						<?php foreach($ctg_arr as $v){?>
							
							<option value="<?php echo $v["cid"]?>">
								<?php echo  str_repeat("-",$v["level"]).$v["cname"];?>
							</option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td>
					<input type="text" name="cname">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<input type="submit" name="sub" value="添加分类">
				</td>
			</tr>
		</table>
	</form>
	
</body>
</html>