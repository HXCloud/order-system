<?php
require_once("CartDao.php");
if($_GET['id'] !=""){
} else
	$_GET['id'] = $_POST['id'];	
$dao = new CartDao();
$dao->delete($_GET['id']);
 echo"<script>alert('删除成功！');history.go(-1);</script>";  
?>