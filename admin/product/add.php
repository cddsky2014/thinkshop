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
	<title>添加商品</title>
</head>
<body>

	<form action="./do_add.php" method="post" enctype="multipart/form-data">	
		<table border=1>
			<tr>
				<td>商品名称</td>
				<td><input type="text" name="pname"></td>
				<td></td>
			</tr>
			<tr>
				<td>商品分类</td>
				<td><select name="p_cid">
					<?php foreach($ctg_arr as $v){?>							
						<option value="<?php echo $v["cid"]?>">
							<?php echo  str_repeat("&nbsp;&nbsp;",$v["level"]).$v["cname"];?>
						</option>
					<?php }?>
				</select></td>
				<td></td>
			</tr>
			<tr>
				<td>原价</td>
				<td><input type="text" name="price"></td>
				<td></td>
			</tr>
			<tr>
				<td>优惠价</td>
				<td><input type="text" name="sprice"></td>
				<td></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td><textarea name="desc"></textarea></td>
				<td></td>
			</tr>
			<tr>
				<td>产地</td>
				<td><input type="text" name="addr"></td>
				<td></td>
			</tr>
			<tr>
				<td>颜色</td>
				<td>
					<input type="checkbox" name="color[]" value="#ff0000">
						<font color="#ff0000" size="5">●</font>
					<input type="checkbox" name="color[]" value="#3366ff">
						<font color="#3366ff" size="5">●</font>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>尺寸</td>
				<td>
					<input type="checkbox" name="size[]" value="m">M
					<input type="checkbox" name="size[]" value="l">L
					<input type="checkbox" name="size[]" value="xl">XL
					<input type="checkbox" name="size[]" value="xxl">XXL
				</td>
				<td></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="isshow" value="1" checked>显示
					<input type="radio" name="isshow" value="2">不显示				
				</td>
				<td></td>
			</tr>

			<tr>
				<td>库存</td>
				<td><input type="text" name="snums"></td>
				<td></td>
			</tr>

			<tr>
				<td>关键字</td>
				<td><input type="text" name="keyword"></td>
				<td></td>
			</tr>

			<tr>
				<td>标题图片</td>
				<td><input type="file" name="thumb[]"></td>
				<td></td>
			</tr>
			<tr>
				<td>商品描述图片</td>
				<td>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
				
				</td>
				<td></td>
			</tr>

			<tr>
				<td><input type="submit" value="提交"></td>
			</tr>

		</table>
	
	</form>
	
</body>
</html>