<?php
session_start();
require("libs/Smarty.class.php");
require_once("MenuDao.php");
$_SESSION['sessuid'];
$smarty = new Smarty();
$menudao = new MenuDao();
$menu = $menudao->findAll();

$smarty->assign("menus", $menu);
$smarty->assign('member',$_SESSION['member']);
$smarty->display("template/index.html");
?>