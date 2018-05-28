<?php
session_start();
require("libs/Smarty.class.php");
$smarty = new Smarty();
function generate_code($length = 6) {
    return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
}
$phonecode=generate_code();
$_SESSION['phonecode'] = $phonecode;  

$smarty->assign('phonecode',$_SESSION['phonecode']);
$smarty->display("template/phonecode.html");
?>