<?php
session_start();
require("libs/Smarty.class.php");
require_once("DetailsDao.php");

$smarty = new Smarty();
$dao = new DetailsDao();
if($_SESSION['sessuid']!=""){
	$detail = $dao->findAll($_GET['orderid']);
	$smarty->assign("details", $detail);
}else{
	echo "<script>alert('no_login');history.go(-1);</script>";
}
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/orderdetails.html");
?>