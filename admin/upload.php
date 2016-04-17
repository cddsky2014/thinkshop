<?php
function upload($ctrl_name,$path="./upload",$allow_type=array("jpg","png","bmp"),$size=2,&$err = array()){
	//3、判断上传目录是否存在，不存在就创建（mkdir）
	if(is_dir($path)==false){
		mkdir($path);
	}
	$res = array();
	foreach($_FILES[$ctrl_name]["name"] as $k=>$v){	
		$name = $_FILES[$ctrl_name]["name"][$k];
		$tmp_name = $_FILES[$ctrl_name]["tmp_name"][$k];
		$size = $_FILES[$ctrl_name]["size"][$k];
		$error = $_FILES[$ctrl_name]["error"][$k];
		$k++;
		//判断是否有文件上传
		if(empty($name)==true){			
			$err[] = "第{$k}个文件没有选择";		
			continue;
		}
		//限制文件大小
		$allow_size = $size*1024*1024;
		if($size>$allow_size){
			$err[] = "第{$k}个大小超出限制";	
			continue;
		}
		//4、判断文件类型是否符合法
		//分割上传文件名,获取用户上传文件的后缀名
		$name_arr = explode(".",$name);
		$postfix = end($name_arr);
		
		if(in_array($postfix,$allow_type)==false){
			$err[]="第{$k}个文件类型不合法";	
			continue;
		}
		//5、判断错误类型
		if($error!=0){
			$err[]="第{$k}个临时文件上传失败";
			continue;
		}
		//6、判断临时文件是否存在
		if(is_file($tmp_name)==false){
			$err[]="第{$k}个临时文件不存在";
			continue;
		}
		//生成文件名
		$file_name = md5(time().rand(11111,99999)).".".$postfix;
		//7、判断上传是否成功
		
		if(move_uploaded_file($tmp_name,$path."/".$file_name)==true){
			$res[] = $file_name;
		}else{
			$err[] ="第{$k}个上传失败";
		}	
	}	
	return $res;
}
?>