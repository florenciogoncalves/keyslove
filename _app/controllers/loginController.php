<?php

require __DIR__ . "./../models/userModel.php";


$alerts = [];

$FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (in_array("", $FILTER)) {
    $alerts[] = "Preencha todos os campos!";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

if (!is_email($_POST['email'])) {
    $alerts[] = "E-mail inválido! Tente novamente";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

$email = filter($_POST['email']);
$senha = filter($_POST['password']);

$auth = new userModel();

if (!$auth->authUser($email, $senha)) {
    $alerts[] = "E-mail ou Senha inválidos! Tente novamente.";
    $_SESSION['error'] = $alerts;
    header("Location: ../../login.php");
    die;
}

header("Location: ../../home/index.php");
