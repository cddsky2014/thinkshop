<?php 
include("./head.php");
include("./link.php");

$ctg1 = mysql_query("select * from ctg where pid=0");//分类


$sql = "select * from product";
$p_list = mysql_query($sql);



?>

		<!--分类-->
		<div class="ctg">
			<ul>
				<?php while($row1 = mysql_fetch_assoc($ctg1)){?>
				<li class="ctg1"><a href=""><?php echo $row1["cname"];?></a>
					<ul class="ctg2">
						<?php 
						$pid = $row1["cid"];
						$ctg2 = mysql_query("select * from ctg where pid=$pid");
						while($row2 = mysql_fetch_assoc($ctg2)){
						?>
						<li><a href=""><?php echo $row2["cname"];?></a></li>
						<?php }?>
					</ul>
				</li>
				<?php }?>
				
			</ul>		
		</div>

		<!--产品列表-->
		<div class="list">
			<ul>
				<?php while($row = mysql_fetch_assoc($p_list)){?>
				<li>
					<img width="180px" src="./upload/<?php echo $row["thumb"];?>" alt="">
					<div class="sprice">&yen;<?php echo $row["sprice"];?></div>
					<div><a href="./detail.php"><?php echo $row["pname"];?></a></div>
					<div>产地:<?php echo $row["addr"];?></div>
				</li>
				<?php }?>
				
			</ul>
		</div>

		<div class="clear"></div>
		
		<!--分页-->
		<div class="page">
			<ul>
				<li><a href="">&lt;&lt;</a></li>
				<li><a href="">&lt;</a></li>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">&gt;</a></li>
				<li><a href="">&gt;&gt;</a></li>
			</ul>
		</div>
		
<?php 
include("./foot.php");
?>
