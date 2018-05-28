<?php
header("Content-type:text/html;charset=utf8");
session_start();
require("libs/Smarty.class.php");
session_destroy();
echo"<script>alert('您已安全退出！');location=('login.php');</script>";
?>