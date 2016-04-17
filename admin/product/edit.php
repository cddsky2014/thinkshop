<?php
	include("../link.php");

	//获取要修改的记录
	$pid = $_GET["pid"];
	$cur = mysql_fetch_assoc(mysql_query("select * from product where pid=$pid"));


	//读取分类
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

	<form action="./do_edit.php" method="post" enctype="multipart/form-data">	

		<input type="hidden" value="<?php echo $cur["pid"]?>" name="pid">
		<table border=1>
			<tr>
				<td>商品名称</td>
				<td><input type="text" name="pname" value="<?php echo $cur["pname"];?>"></td>
				<td></td>
			</tr>
			<tr>
				<td>商品分类</td>
				<td><select name="p_cid">
					<?php foreach($ctg_arr as $v){?>							
						<option <?php if($cur["p_cid"]==$v["cid"]){echo "selected";}?> value="<?php echo $v["cid"]?>">
							<?php echo  str_repeat("&nbsp;&nbsp;",$v["level"]).$v["cname"];?>
						</option>
					<?php }?>
				</select></td>
				<td></td>
			</tr>
			<tr>
				<td>原价</td>
				<td><input type="text" name="price" value="<?php echo $cur["price"];?>"></td>
				<td></td>
			</tr>
			<tr>
				<td>优惠价</td>
				<td><input type="text" name="sprice" value="<?php echo $cur["sprice"];?>"></td>
				<td></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td><textarea name="descp"><?php echo $cur["descp"];?></textarea></td>
				<td></td>
			</tr>
			<tr>
				<td>产地</td>
				<td><input type="text" name="addr" value="<?php echo $cur["addr"];?>"></td>
				<td></td>
			</tr>
			<tr>
				<td>颜色</td>
				<td>
					<?php 
						$colors = explode(",",$cur["color"]);
					?>
					<input <?php if(in_array("#ff0000",$colors)){echo "checked";}?> type="checkbox" name="color[]" value="#ff0000">
						<font color="#ff0000" size="5">●</font>
					<input <?php if(in_array("#3366ff",$colors)){echo "checked";}?> type="checkbox" name="color[]" value="#3366ff">
						<font color="#3366ff" size="5">●</font>
				</td>
				<td></td>
			</tr>

			<tr>
				<td>尺寸</td>
				<td>
				<?php 
					$sizes = explode(",",$cur["size"]);
				?>
					<input <?php if(in_array("m",$sizes)){echo "checked";}?>  type="checkbox" name="size[]" value="m">M
					<input <?php if(in_array("l",$sizes)){echo "checked";}?> type="checkbox" name="size[]" value="l">L
					<input <?php if(in_array("xl",$sizes)){echo "checked";}?> type="checkbox" name="size[]" value="xl">XL
					<input <?php if(in_array("xxl",$sizes)){echo "checked";}?> type="checkbox" name="size[]" value="xxl">XXL
				</td>
				<td></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input <?php if($cur["isshow"]==1){echo "checked";}?> type="radio" name="isshow" value="1">显示
					<input <?php if($cur["isshow"]==2){echo "checked";}?> type="radio" name="isshow" value="2">不显示				
				</td>
				<td></td>
			</tr>

			<tr>
				<td>库存</td>
				<td><input type="text" name="snums" value="<?php echo $cur["snums"];?>"></td>
				<td></td>
			</tr>

			<tr>
				<td>关键字</td>
				<td><input type="text" name="keyword" value="<?php echo $cur["keyword"];?>"></td>
				<td></td>
			</tr>

			<tr>
				<td>标题图片</td>
				<td><img width="80px" src="../../upload/<?php echo $cur["thumb"];?>" alt=""><br>
				<input type="file" name="thumb[]">
					
				</td>
				<td></td>
			</tr>
			<tr>
				<td>商品描述图片</td>
				<td>
					<?php
						$pimgs = explode(",",$cur["pimgs"]);
						foreach($pimgs as $v){
							echo "<img width='80px' src='../../upload/$v'>";
						}
					?>
					<br>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
					<input type="file" name="pimgs[]"><br>
				
				</td>
				<td></td>
			</tr>

			<tr>
				<td colspan=3><input type="submit" value="提交"></td>
			</tr>

		</table>
	
	</form>
	
</body>
</html>