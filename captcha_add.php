<?php session_start();?>
<?php require_once "Captcha.php"; ?>
<?php @ob_get_level();
header("content-type:image/jpeg");
@ob_end_clean();
$captcha=new Captcha();
$captcha->captchaControl(200,50);
$_SESSION['captcha']=$captcha->getCaptchaCode();
