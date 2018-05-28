<?php
session_start();
require_once("UserDao.php");
$dao = new UserDao();
$user = $dao->findByAccount($_POST['account']);
if ($user->getId() != "") {
	if ($user->getPasswd() == $_POST['passwd']) {
		if($_POST['passcode']==$_SESSION["authnum_session"]){
			echo "success";
			$_SESSION['sessuid'] = $user->getId();
			$_SESSION['member'] = $_POST['account'];
			header('Location: index.php');
		}else{
			echo "<script>alert('验证码有误');parent.location.href='login.php';</script>";
		}
	} else {
		echo "<script>alert('密码有误，请重新输入！');parent.location.href='login.php';</script>";
	}
} else {
	echo "<script>alert('此账户不存在，请重新输入！');parent.location.href='login.php';</script>";
}
?>