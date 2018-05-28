<?php
session_start();
require_once("OrderDao.php");
require_once("DetailsDao.php");
require_once("CartDao.php");

$orderdao = new OrderDao();
$detailsdao = new DetailsDao();
$cartdao = new CartDao();

if($_SESSION['sessuid']!=""){
	//$orderdao->save($_SESSION['sessuid'],$_POST['total']);
	$orderid= $orderdao->save($_SESSION['sessuid'],$_POST['total']);  //刚插入数据的id
	for($i=0;$i<100;$i++){
 	$detailsdao->save($orderid,$_POST['menuid'][$i],$_POST['price'][$i],
        $_POST['number'][$i], $_POST['subtotal'][$i],$_POST['img'][$i]);
	}
	$cartdao->delCart($_SESSION['sessuid']);
	echo"<script>alert('订单提交成功！');history.go(-1);</script>";
}else{
	echo"<script>alert('请先登录！');parent.location.href='login.php</script>";  
}
?>