<?php
session_start();
//require __DIR__."./../boot/mail.php";
require __DIR__ . "./../boot/helpers.php";
// echo generateVerificationCode();
$_SESSION['step'] += 1;
header("Location: ../../about-user/trabalho-e-profissao.php");
