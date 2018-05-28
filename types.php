<?php
session_start();
require("libs/Smarty.class.php");
require_once("MenuDao.php");
$_SESSION['sessuid'];

$smarty = new Smarty();

$dao = new MenuDao();
$type = $dao->findType($_GET["typeid"]);
$smarty->assign("types", $type);
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/types.html");
?>