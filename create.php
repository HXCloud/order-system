<?php
session_start();
require_once("UserDao.php");
$userdao = new UserDao();
$user = $userdao->findByAccount($_POST['account']);
if($user->getId() == ""){
	 if (empty($_POST["account"])) {
   		 echo "<script>alert('用户名是必填的');history.go(-1);</script>"; 
	}else if(empty($_POST["passwd"])){
		echo "<script>alert('密码是必填的');history.go(-1);</script>"; 
	}else if(strlen($_POST["passwd"])<6 || strlen($_POST["passwd"])>11){
		echo "<script>alert('密码格式不正确');history.go(-1);</script>"; 
	}else if(empty($_POST["phone"])){
		echo "<script>alert('手机是必填的');history.go(-1);</script>"; 
	}else if(!preg_match("/^1[34578]{1}\d{9}$/",$_POST["phone"])){
		echo "<script>alert('手机格式错误');history.go(-1);</script>";
	}else if(empty($_POST["code"])){
		echo "<script>alert('验证码是必填的');history.go(-1);</script>"; 
	}else if($_POST['code'] != $_SESSION["phonecode"]){
		echo "<script>alert('验证码有误');history.go(-1);</script>";
	}else{
		$userdao->save($_POST['account'], $_POST['passwd'], $_POST['phone']);
		echo"<script>alert('注册成功！請登录！');window.location.href='login.php'</script>";
	}
}else{
	echo "<script>alert('用户名已存在');history.go(-1);</script>"; 
}
?>