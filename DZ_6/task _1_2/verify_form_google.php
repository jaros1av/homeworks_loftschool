<?php
require_once "vendor/autoload.php";
$remoteIP = $_SERVER['REMOTE_ADDR'];
$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$recaptcha = new \ReCaptcha\ReCaptcha("6LcLZToUAAAAAKKFGDRjXMyeR8CfhY6ezz8ZcJoZ");
$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIP);
$verify = $resp->isSuccess();