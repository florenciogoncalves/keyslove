<?php

session_start();

$errors = [];

require __DIR__ . "./../models/Support.php";
require __DIR__ . "./../boot/mail.php";



if (isset($_SESSION['username']) && isset($_SESSION['userEmail'])) {
    $user = $_SESSION['username'];
    $emailUser = $_SESSION['userEmail'];
}

$support = new Support($emailUser, $user);
$userCode = filter_var($_POST['otp-pass'], FILTER_VALIDATE_INT);

if ($userCode != $support->getVerificationCode()) {
    $errors[] = "O Código de verificação inserido está incorreto! Por favor, verifique e tente novamente.";
    $_SESSION['error'] = $errors;
    header("Location: ../../cadastro/cadastro-6.php");
} else {
    $support->deleteCode();
    $_SESSION['step'] += 1;
    header("Location: ../../about-user/trabalho-e-profissao.php");
}
