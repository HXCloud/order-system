<?php
//header('Content-type:text/json');
session_start();
require_once("CartDao.php");

$dao = new CartDao();
if($_SESSION['sessuid']!=""){
	$dao->saveCart($_SESSION['sessuid'],$_GET['menuid'],$_POST['name'],$_POST['price'],$_GET['number'],$_POST['img']);
	/*$json='{
		"status":"success"
	}';
	echo $json;*/
	echo"<script>alert('添加成功！');history.go(-1);</script>"; 	
}else{
	
	echo"<script>alert('请先登录！');parent.location.href='login.php';</script>";
	  
}
?>