<?php
session_start();
require("libs/Smarty.class.php");
require_once("OrderDao.php");

$smarty = new Smarty();
$dao = new OrderDao();
if($_SESSION['sessuid']!=""){
	$starttime=$_POST['starttime'];
	$endtime=$_POST['endtime'];
	if($starttime!=""){
		$order = $dao->findByDate($_SESSION['sessuid'],$starttime,$endtime);
		if(!$order){
			$orderr = "暂无订单信息";
			$smarty->assign("orderr", $orderr);
		}
	}else{
		$order = $dao->findAll($_SESSION['sessuid']);
		if(!$order){
			$orderr = "暂无订单信息";
			$smarty->assign("orderr", $orderr);
		}
	}
	$smarty->assign("orders", $order);
}else{
	echo "<script>alert('>_<请先登录！');history.go(-1);</script>";
}
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/orders.html");
?>