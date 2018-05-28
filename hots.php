<?php
session_start();
require("libs/Smarty.class.php");
require_once("MenuDao.php");
$_SESSION['sessuid'];

$smarty = new Smarty();

$dao = new MenuDao();
$hot = $dao->findHot($_GET["hot"]);
$smarty->assign("hots", $hot);
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/hots.html");
?>