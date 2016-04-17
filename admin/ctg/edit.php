<?php
	include("../link.php");
	
	$cid = $_GET["cid"];
	//获取当前被修改的记录
	$cur_row = mysql_fetch_assoc(mysql_query("select * from ctg where cid='$cid'"));


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
	<title>修改</title>
</head>
<body>
	<h1>修改分类</h1>
	<form action="./do_edit.php" method="post">
		<input type="hidden" value="<?php echo $cid;?>" name="cid">
		<table>
			<tr>
				<td>上级分类</td>
				<td>
					<select name="pid">
						<?php foreach($ctg_arr as $v){?>
							<option <?php 
								if($v["cid"]==$cur_row["pid"]){
									echo "selected";
								}
							?> value="<?php echo $v["cid"]?>">
								<?php echo  str_repeat("-",$v["level"]).$v["cname"];?>
							</option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td>
					<input type="text" name="cname" value="<?php echo $cur_row["cname"]?>">
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<input type="submit" name="sub" value="修改分类">
				</td>
			</tr>
		</table>
	</form>
	
</body>
</html>