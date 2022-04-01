<?php session_start();?>
<?php require_once "Captcha.php"; ?>
<?php @ob_get_level();
header("content-type:image/jpeg");
@ob_end_clean();
$captcha=new Captcha();
$captcha->captchaControl(300,100,30);
$_SESSION['captcha']=$captcha->getCaptchaCode();