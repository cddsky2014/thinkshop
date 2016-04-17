<?php 
include("./head.php");
?>

<div class="reg">
	<div class="reg_l"> 注册新用户 </div>
	<div class="reg_r">
		<form action="" method="post">
			<table>
				<tr>
					<td>*用户名</td>
					<td><input type="text" name="uname"></td>
					<td>字母开始，字母数字，6-18位</td>
				</tr>

				<tr>
					<td>*密码</td>
					<td><input type="password" name="pwd"></td>
					<td>6-18位</td>
				</tr>

				<tr>
					<td>*确认密码</td>
					<td><input type="password" name="pwd2"></td>
					<td></td>
				</tr>

				<tr>
					<td>*昵称</td>
					<td><input type="text" name="nick"></td>
					<td>中文3-18位</td>
				</tr>
				<tr>
					<td>手机</td>
					<td colspan=2><input type="text" name="tel"></td>
				</tr>

				<tr>
					<td>性别</td>
					<td colspan=2>
						<input checked style="width:15px;height:15px;" type="radio" name="sex" value="1">男
						&nbsp;
						<input style="width:15px;height:15px;" type="radio" name="sex" value="2">女
					</td>
				</tr>

				<tr>
					<td>*邮箱</td>
					<td><input type="text" name="email"></td>
					<td>例如：admin@qq.com</td>
				</tr>

				<tr>
					<td>*验证码</td>
					<td colspan=2><input style="width:100px;" type="text" name="validcode"></td>
				</tr>
				
				<tr>
					<td></td>
					<td colspan=2><input  style="width:15px;height:15px;" type="checkbox" name="ept">接受本站注册协议</td>
				</tr>
				
				<tr>
					<td></td>
					<td colspan=2><input style="width:100px;height:30px;" type="submit" name="sub" value="注册"></td>
				</tr>
			</table>

		</form>
	
	</div>

</div>





<?php 
include("./foot.php");
?>

