<?php
session_start();
require("libs/Smarty.class.php");
require_once("CartDao.php");

$smarty = new Smarty();
$_SESSION['sessuid'];


$dao = new CartDao();
if($_SESSION['sessuid']!=""){
	$cart = $dao->findAll($_SESSION['sessuid']); 
	if(!$cart){
		echo "<script>alert('购物车中暂无商品，赶快去选购吧！');parent.location.href='index.php';</script>";
	}else{
	    $s= $dao->findMoney($_SESSION['sessuid']);
		$smarty->assign("s", $s);
		$smarty->assign("carts", $cart);
	}
}else{
	echo "<script>alert('>_<请先登录！');history.go(-1);</script>";
}
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/carts.html");
?>