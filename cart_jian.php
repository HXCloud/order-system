<?php
session_start();
require_once("CartDao.php");

$dao = new CartDao();
if($_SESSION['sessuid']!=""){
	$dao->jian($_GET['id']);
	header('Location: carts.php');	
}else{
	
	echo"<script>alert('请先登录！');history.go(-1);</script>";  
	
}
?>