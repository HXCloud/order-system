<?php
session_start();
require("libs/Smarty.class.php");
$smarty = new Smarty();
if($_SESSION['member']){
		echo"<script>alert('请先退出登录再注册!');location=('index.php');</script>";
	}else{
$smarty->display("template/register.html");
}
?>