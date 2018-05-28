<?php
session_start();
header("Content-type: image/png");
$num1 = mt_rand(0,9);//第一位数
$num2 = mt_rand(1,9);//第二位数
$type_str = "+-*";//方法字符串集合
$type = substr($type_str,rand(0,2),1);//随机方法
$change = mt_rand(1,3);
if($change==1){
 $code = "$num1$type$num2=?";
 $result = "\$verifyCode=$num1$type$num2;";
 eval($result);
 $_SESSION['authnum_session'] = $verifyCode;  
}elseif($change==2){
 $result = "\$verifyCode=$num1$type$num2;";
 eval($result);
    $code = $num1.$type."_=".$verifyCode;
 $_SESSION['authnum_session'] = $num2;  
}elseif($change==3){
 $result = "\$verifyCode=$num1$type$num2;";
 eval($result);
    $code = "_".$type.$num2."=".$verifyCode;
 $_SESSION['authnum_session'] = $num1;  
}
$im = imagecreate(78,38);   
$black = imagecolorallocate($im, 0,0,0);     
$white = imagecolorallocate($im, 255,255,255);
$gray = imagecolorallocate($im, 200,200,200);
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im,0,0,$white);        
imagestring($im, 5, 10, 8, $code, $black);    
for($i=0;$i<50;$i++) {
 imagesetpixel($im, mt_rand(0, 78) , mt_rand(0, 38) , $black); 
 imagesetpixel($im, mt_rand(0, 78) , mt_rand(0, 38) , $red); 
 imagesetpixel($im, mt_rand(0, 78) , mt_rand(0, 38) , $gray); 
}
imagepng($im);
imagedestroy($im);
?>